<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description'];
    
    protected $casts = [
        'image' => 'array',
    ];
    
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }
    
    public function getImageAttribute($value)
    {
        return json_decode($value, true);
    }
}