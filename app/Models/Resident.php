<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentFactory> */
    use HasFactory;

    protected $fillable = [
        'household_id',
        'first_name',
        'last_name',
        'middle_name',
        'voter_status',
        'birthdate',
        'gender',
        'civil_status',
        'contact_number',
    ];

    public function house_hold()
    {
        return $this->belongsTo(Household::class);
    }
}
