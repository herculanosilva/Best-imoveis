<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finality extends Model
{
    use HasFactory;

    public function immobiles(){
        return $this->hasMany(Immobile::class);
    }
}
