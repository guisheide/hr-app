<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeInCompany($query)
    {
        return $query->where('company_id', $this->company_id);
    }

    public function getMothYearAttribute()
    {
        return $this->month . '-' . $this->year;
    }

    public function getMothStringAttribute()
    {
        return Carbon::parse($this->month . '-01-' . $this->year)->format('F Y');
    }
}
