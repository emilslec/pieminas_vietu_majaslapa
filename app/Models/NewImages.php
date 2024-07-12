<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewImages extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'monument_id'];
    public function object()
    {
        return $this->belongsTo(Monument::class);
    }
}
