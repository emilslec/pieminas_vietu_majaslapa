<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['title'];
    public function monuments()
    {
        return $this->belongsToMany(Monument::class);
    }
}
