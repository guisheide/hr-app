<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function scopeInCompany($query)
    {
        return $query->whereHas('designation', function ($q)
        {
            $q->inCompany();
        });
    }

    public function getDurationAttribute()
    {
        $start = \Carbon\Carbon::parse($this->start_date);
        $end = \Carbon\Carbon::parse($this->end_date);
        return $start->diffInDays($end) . ' days';
    }

    public function scopeSearchByEmployeeName($query, $employee)
    {
        return $query->whereHas('employee', function ($q) use ($employee)
        {
            $q->where('name', 'like', '%' . $employee . '%');
        });
    }

    // public function getTotalEarnings($monthYear)
    // {
    //     $this->rate_type == 
    // }
}
