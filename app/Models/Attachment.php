<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = ['path'];

    // protected $casts = [
    //     'path' =>'json',
    // ];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
