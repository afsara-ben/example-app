<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;
    /**
     * Get the profile that owns the phone.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    
}
