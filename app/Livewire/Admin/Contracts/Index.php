<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function deleteContract($id){
        $contract = Contract::inCompany()->find($id);
        $contract->delete();
        session()->flash('success', 'Contract deleted successfully');
        //Lógica para eliminar contrato
    }


    public function render()
    {
        return view('livewire.admin.contracts.index', [
            'contracts' => Contract::inCompany()->searchByEmployee($this->search)->orderBy('created_at','desc')->paginate(10),
        ]);
    }
}
