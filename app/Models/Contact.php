<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Contact.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function group()
    {
        return $this->belongsTo(group::class);
    }

    public function item()
    {
        return $this->belongsTo(items::class);
    }
}


