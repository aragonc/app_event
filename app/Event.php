<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'subtitle',
        'date',
        'place',
        'thematic',
        'schedule',
        'contact',
        'background_top',
        'background_bottom',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function clients(){
        return $this->hasMany(Clients::class);
    }

}
