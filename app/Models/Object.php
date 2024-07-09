<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'type'];
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function oldImages()
    {
        return $this->hasMany(OldImages::class);
    }
}
