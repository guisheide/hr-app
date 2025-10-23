<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'designation_id',
        'address',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function department()
    {
        return $this->designation->department();
    }

    public function scopeInCompany($query, $companyId)
    {
        return $query->whereHas('designation.department', function ($q) use ($companyId) {
            $q->where('company_id', $companyId);
        });
    }

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function getActiveContract($startDate, $endDate)
    {
        return $this->contracts()
                    ->where('start_date', '<=', $startDate)
                    ->where('end_date', '>=', $endDate)
                    ->first();
    }
}
