<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;

class Edit extends Component
{
   public $contract;

    public $search = '';

    public $department_id;

    public function rules ()
    {
        return [
            'contract.employee_id' => 'required',
            'contract.start_date' => 'required|date',
            'contract.end_date' => 'nullable|date',
            'contract.designation_id' => 'required',
            'contract.rate_type' => 'required',
            'contract.rate' => 'required|numeric',
        ];
    }

    public function mount($id)
    {
        $this->contract = Contract::find($id);
    }

    public function selectEmployee($id){
        $this->contract->employee_id = $id;
        $this->search = $this->contract->employee->name;
        $this->department_id = $this->contract->designation->department_id;
    }

    public function saveContract(){
        $this->validate();
        $this->contract->company_id = session('company_id');
        $this->contract->save();
        session()->flash('success', 'Contract edited successfully');
        return redirect()->route('contracts.index');
    }

    public function render()
    {
        $employees = Employee::inCompany()->searchByName($this->search)->get();
        $departments = Department::inCompany()->get();
        $designations = $this->department_id ? Department::inCompany()->find($this->department_id)->designations : collect();
        return view('livewire.admin.contracts.edit', [
            'employees' => $employees,
            'departments' => $departments,
            'designations' => $designations,
        ]);
    }
}
