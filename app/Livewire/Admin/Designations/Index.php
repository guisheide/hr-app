<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Designation;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;
    public function delete ($id){
        Designation::find($id)->delete();
        session()->flash('message', 'Designation deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.designations.index');
    }
}
