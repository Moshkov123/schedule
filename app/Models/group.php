<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function items()
    {
        return $this->belongsToMany(items::class);
    }
    public function Students()
    {
        return $this->hasMany(User::class);
    }
}