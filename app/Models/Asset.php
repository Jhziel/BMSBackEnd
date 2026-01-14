<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory;

    protected $fillable = [
        'barangay_employee_id',
        'item_name',
        'type',
        'serial_number',
        'amount',
        'status',
    ];

    public function barangay_employees()
    {
        return $this->belongsTo(BarangayEmployee::class);
    }
}
