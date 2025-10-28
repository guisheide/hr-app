<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Create extends Component
{

    public $contract;

    public $search = '';

    public $department_id;

    public function rules ()
    {
        return [
            'contract.employee_id' => 'required',
            'contract.start_date' => 'required|date',
            'contract.end_date' => 'nullable|date|after_or_equal:contract.start_date',
            'contract.designation_id' => 'required',
            'contract.rate_type' => 'required',
            'contract.rate' => 'required|numeric',
        ];
    }

    public function mount()
    {
        $this->contract = new Contract();
    }

    public function selectEmployee($id){
        $this->contract->employee_id = $id;
        $this->search = $this->contract->employee->name;
    }

    public function save(){
        $this->validate();
        // if($this->contract->employee()->getActiveContract($this->contract->start_date, $this->contract->end_date)){
        //     throw ValidationException::withMessages([
        //         'contract.start_date' => 'Employee already has an active contract in the selected date range.',
        //     ]);
        // }
        $this->contract->save();
        session()->flash('success', 'Contract created successfully');
        return redirect()->route('contracts.index');
    }

    public function render()
    {
        $employees = Employee::inCompany()->searchByName($this->search)->get();
        $departments = Department::inCompany()->get();
        $designations = $this->department_id ? Department::inCompany()->find($this->department_id)->designations : collect();
        return view('livewire.admin.contracts.create', [
            'employees' => $employees,
            'departments' => $departments,
            'designations' => $designations,
        ]);
    }
}
