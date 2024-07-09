<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectType extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['title'];
    public function object()
    {
        return $this->hasMany(Object::class);
    }
}
