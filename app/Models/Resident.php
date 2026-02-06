<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

class Resident extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentFactory> */
    use HasFactory;

    protected $appends = ['avatar_url'];

    protected $fillable = [
        'resident_id',
        'barangay_code',
        'first_name',
        'last_name',
        'middle_name',
        'birthdate',
        'gender',
        'civil_status',
        'voter_status',
        'contact_number',
        'occupation',
        'citizenship',
        'religion',
        'avatar',
    ];

    public function house_hold()
    {
        return $this->belongsTo(Household::class);
    }

    protected static function booted()
    {
        static::creating(function ($resident) {

            DB::transaction(function () use ($resident) {

                $barangayCode = $resident->barangay_code ?? 'BG';

                $counter = DB::table('resident_counters')
                    ->where('barangay_code', $barangayCode)
                    ->lockForUpdate()
                    ->first();

                if (!$counter) {
                    throw new \Exception("Counter not found for {$barangayCode}");
                }

                $newNumber = $counter->last_number + 1;

                DB::table('resident_counters')
                    ->where('id', $counter->id)
                    ->update(['last_number' => $newNumber]);

                $resident->resident_id =
                    $barangayCode . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
            });
        });
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? asset('storage/' . $this->avatar) : null;
    }
}
