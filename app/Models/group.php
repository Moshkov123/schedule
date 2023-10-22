<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Group.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    public function group()
    {
        return $this->hasMany(Contact::class);
    }
}