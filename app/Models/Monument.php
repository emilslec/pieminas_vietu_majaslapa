<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type_id'];
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function oldImages()
    {
        return $this->hasMany(OldImages::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
