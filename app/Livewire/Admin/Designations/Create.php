<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Department;
use App\Models\Designation;
use Livewire\Component;

class Create extends Component
{

    public $designation;

    public function rules()
    {
        return [
            'designation.name' => 'required|string|max:255',
            'designation.department_id' => 'required|exists:departments,id',
        ];
    }

    public function save(){
        $this->validate();
        $this->designation->save();
        session()->flash('sucess', 'Designation created successfully');
        return $this->redirectIntended(route('designations.index', true));
    }

    public function mount(){
        $this->designation = new Designation();
    }

    public function render()
    {
        return view('livewire.admin.designations.create', [
            'departments' => Department::inCompany()->get(),
        ]);
    }
}
