<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class,'users_domains');
    }
    public function links()
    {
        return $this->hasMany(Link::class);
    }

}
