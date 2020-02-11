<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'event_id',
        'feature_title',
        'feature_content',
        'feature_extra',
        'feature_visible',
        'feature_icon'
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
