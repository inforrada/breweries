<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'winery', 'price', 'vol'];

    public function bars () {
        return $this->belongsToMany(Bar::class, 'bar_wine');
    }
}
