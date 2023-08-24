<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = ['owner', 'manufacturer_id', 'type_id', 'price'];


    public function manufacturer()
{
    return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
}

public function type()
{
    return $this->belongsTo(Type::class, 'type_id');
}
}
