<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'role_id', 'object_id'];
    public function object()
    {
        return $this->belongsTo(Object::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
