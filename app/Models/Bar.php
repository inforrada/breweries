<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];
    //protected $guard = ['id']
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function wines () {
        return $this->belongsToMany(Wine::class, 'bar_wine');
    }
    
    public function images () {
        return $this->hasMany(Image::class);
    }
}
