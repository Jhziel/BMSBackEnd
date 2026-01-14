<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayEmployee extends Model
{
    /** @use HasFactory<\Database\Factories\BarangayEmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birthdate',
        'gender',
        'job_title',
        'employment_type',
        'civil_status',
        'contact_number',
        'citizenship',
        'religion',
        'status',
        'hired_at'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
