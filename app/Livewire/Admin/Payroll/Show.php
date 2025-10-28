<?php

namespace App\Livewire\Admin\Payroll;

use App\Models\Payroll;
use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Show extends Component
{

    public $payroll;

    public function mount($id){
        $this->payroll = Payroll::inCompany($id);
    }    

    public function generatePayslips($id){
        $salary = Salary::find($id);
        $pdf = Pdf::loadView('pdf.payslip', ['salary' => $salary]);
        $pdf->setPaper(array(0,0,400,1500), 'portrait');
        $filepath = storage_path('app/public/payslips/payslip_'.$salary->id.'.pdf');
        $pdf->save($filepath);
        return response()->download($filepath)->deleteFileAfterSend();
    }    
    public function render()
    {
        return view('livewire.admin.payroll.show');
    }
}
