<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    use WithoutUrlPagination, WithPagination;

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
    public function render()
    {
        return view('livewire.admin.employees.index', [
            'employees' => Employee::inCompany(10)->paginate(10)
        ]);
    }
}
