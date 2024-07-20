<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type_id', 'state', 'location', 'people'];

    public function oldImages()
    {
        return $this->hasMany(OldImages::class);
    }
    public function newImages()
    {
        return $this->hasMany(NewImages::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function description()
    {
        return $this->hasOne(Description::class);
    }
    public function placeDescription()
    {
        return $this->hasOne(PlaceDescription::class);
    }
}
