<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldImages extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'monument_id', 'description'];
    public function object()
    {
        return $this->belongsTo(Monument::class);
    }
}
