<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'url',
        'description',
        'image'
    ];
    public function events(){
        return $this->hasMany(Event::class);
    }
    public function emails(){
        return $this->hasMany(Email::class);
    }

}
