<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'content',
        'extra',
        'visible',
        'icon'
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
