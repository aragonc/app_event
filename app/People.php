<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'name',
        'dni',
        'email',
        'phone',
        'authorize',
        'event_id'
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
