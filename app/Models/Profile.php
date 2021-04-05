<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function mobiles()
    {
        return $this->hasMany(Mobile::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setPhotoAttribute($photo)
    {
        if (is_array($photo)) {
            $this->attributes['photo'] = json_encode($photo);
        }
    }

    public function getPhotoAttribute($photo)
    {
        return json_decode($photo, true);
    }
}
