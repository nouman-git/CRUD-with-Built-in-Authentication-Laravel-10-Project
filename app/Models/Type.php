<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['vehicle_name'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
