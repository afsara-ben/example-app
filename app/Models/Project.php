<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The users that belong to the project.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user');

    }

     /**
     * The admin that belong to the project.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
        
    }
}
