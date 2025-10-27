<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithoutUrlPagination, WithPagination;

    // 1. ADICIONE A PROPRIEDADE DE BUSCA
    public string $search = '';

    // 2. ADICIONE ESTE MÉTODO
    //    Isso reseta a paginação para a página 1 sempre que a busca mudar.
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
            session()->flash('message', 'Employee deleted successfully.');
        } else {
            session()->flash('error', 'Employee not found.');
        }
    }

    // 3. ATUALIZE O MÉTODO RENDER
    public function render()
    {
        // Aplica a busca na query
        $employees = Employee::inCompany()
            ->when($this->search, function ($query) {
                // Agrupa a lógica de 'OU' para não interferir em outros 'where'
                $query->where(function ($subQuery) {
                    $subQuery->where('name', 'like', '%' . $this->search . '%')
                             ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10); // A paginação vem no final

        return view('livewire.admin.employees.index', [
            'employees' => $employees
        ]);
    }
}