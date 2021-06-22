<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
class chat extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function messages(){
//        return $this->hasMany('\App\Models\Message');
        return $this->hasMany(Message::class);
    }

}
