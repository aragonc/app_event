<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'date',
        'place',
        'thematic',
        'schedule',
        'contact',
        'contact_email',
        'contact_phone',
        'image_top',
        'image_bottom',
        'primary_color',
        'secondary_color',
        'embed',
        'terms',
        'content',
        'media',
        'brochure',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function clients(){
        return $this->hasMany(People::class);
    }
}
