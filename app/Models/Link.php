<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function qrcodes()
    {
        return $this->hasMany(Qr_code::class);
    }
}
