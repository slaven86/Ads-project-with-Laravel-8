<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function ad(){
        return $this->belongsTo(Ad::class);
    }

    public function sender(){
        return $this->belongsTo(User::class);
    }
}
