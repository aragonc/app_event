<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'content',
        'media',
        'brochure'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

}
