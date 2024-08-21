<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntervalsMonuments extends Model
{
    use HasFactory;
    protected $fillable = ['monument_id', 'interval_id'];

    public function monument()
    {
        return $this->belongsTo(Monument::class);
    }
    public function interval()
    {
        return $this->belongsTo(Interval::class);
    }
}
