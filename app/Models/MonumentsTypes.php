<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonumentsTypes extends Model
{
    use HasFactory;
    protected $fillable = ['monument_id', 'type_id'];

    public function monument()
    {
        return $this->belongsTo(Monument::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
