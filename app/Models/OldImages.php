<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldImages extends Model
{
    use HasFactory;

    protected $fillable = ['path'];
    public function object()
    {
        return $this->belongsTo(Object::class);
    }
}
