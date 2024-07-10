<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['person_id', 'role_id', 'monument_id'];
    public function object()
    {
        return $this->belongsTo(Monument::class);
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
