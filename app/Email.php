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
        'brochure',
        'type',
        'category_id'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
