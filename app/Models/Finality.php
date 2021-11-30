<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finality extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function immobiles(){
        // relacionamento 1 - N
        return $this->hasMany(Immobile::class);
    }
}
