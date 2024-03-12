<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr_code extends Model
{
    use HasFactory;
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
