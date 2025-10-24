<?php

namespace App\Livewire\Admin\Departments;

use Livewire\Component;
use App\Models\Department;

class Edit extends Component
{
    public $department;

    public function rules()
    {
        return [
            'department.name' => 'required|string|max:255',
        ];
    }

    public function mount($id)
    {
        $this->department = Department::findOrFail($id);
    }

    public function save()
    {
        $this->validate();
        $this->department->save();
        session()->flash('message', 'Department edited successfully.');
        return redirect()->route('departments.index');
    }
    
    public function render()
    {
        return view('livewire.admin.departments.edit');
    }
}
