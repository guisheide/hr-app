<?php

namespace App\Livewire\Admin\Payroll;

use App\Models\Employee;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;

    public function rules()
    {
        return [
            'monthYear' => 'required',
        ];
    }

    public function generatePayroll(){
        $this->validate();
        $date = Carbon::parse($this->monthYear);
        if(Payroll::inCompany()->where('moth',$date->format('Y-m'))->exists()){
            throw ValidationException::withMessages(['monthYear' => 'Payroll already generated for this month']);
        }else{
            $payroll = new Payroll();
            $payroll->year = $date->format('Y');
            $payroll->month = $date->format('m');
            $payroll->company_id = session('company_id');
            $payroll->save();
            foreach(Employee::inCompany()->get() as $employee){
                $contract = $employee->getActiveContract($date->startOfMonth()->toDateString(), $date->endOfMonth()->toDateString());
            if($contract){
                $payroll->salaries()->create([
                    'employee_id' => $employee->id,
                    'gross_salary' => $contract->getTotalEarnings($date->format('Y-m'))
                    ]);
                }
            }
        session()->flash('sucess','Payroll generated successfully');
        }
    }

    //Incompleto
    public function updatePayroll($id){
        $payroll = Payroll::inCompany()->find($id);
        $payroll->salaries()->delete();
        foreach(Employee::inCompany()->get() as $employee){
            $contract = $employee->getActiveContract($payroll->startOfMonth()->toDateString(), $payroll->endOfMonth()->toDateString());
            if($contract){
                $payroll->salaries()->create([
                    'employee_id' => $employee->id,
                    'gross_salary' => $contract->getTotalEarnings($payroll->moth. '-' . $payroll->year)
                    ]);
                }
            
        }
        session()->flash('sucess','Payroll generated successfully');

    }

    public function render()
    {
        return view('livewire.admin.payroll.index', [
            'payrolls' => Payroll::inCompany()->orderBy('year','desc')->orderBy('month', 'desc')->paginate(10),
        ]);
    }
}
