<?php

namespace App\Livewire\Admin\Departments;

use Livewire\Component;

class Create extends Component
{
    public $department;

    public function rules()
    {
        return [
            'department.name' => 'required|string|max:255',
        ];
    }

    public function mount()
    {
        $this->department = new \App\Models\Department();
    }

    public function save()
    {
        $this->validate();
        $this->department->company_id = session('company_id');
        $this->department->save();
        session()->flash('message', 'Department created successfully.');
        return redirect()->route('departments.index');
    }
    public function render()
    {
        return view('livewire.admin.departments.create');
    }
}
