<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'state', 'location', 'people', 'cover'];

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
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
    public function intervals()
    {
        return $this->belongsToMany(Interval::class);
    }
    public function description()
    {
        return $this->hasOne(Description::class);
    }
    public function placeDescription()
    {
        return $this->hasOne(PlaceDescription::class);
    }

    public function coverPath()
    {
        if ($this->cover === 'new' && $this->newImages->isNotEmpty()) {
            return asset('storage/' . $this->newImages->first()->path);
        } elseif ($this->cover === 'old' && $this->oldImages->isNotEmpty()) {
            return asset('storage/' . $this->oldImages->first()->path);
        }

        return asset('storage/images/default.png'); // Default image if no cover is found
    }
}
