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
        return $this->hasMany(Photo::class, 'photo_id');
    }

    public function setPicturesAttribute($multiImages)
    {
        if (is_array($multiImages)) {
            $this->attributes['multiImages'] = json_encode($multiImages);
        }
    }

    public function getPicturesAttribute($multiImages)
    {
        return json_decode($multiImages, true);
    }
}
