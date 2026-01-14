<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayOfficial extends Model
{
    /** @use HasFactory<\Database\Factories\BarangayOfficialFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'gender',
        'civil_status',
        'contact_number',
        'position',
        'birthdate',
        'term_start',
        'term_end',
    ];
}
