<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Item.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    public function items()
    {
        return $this->hasMany(Contact::class);
    }
}
