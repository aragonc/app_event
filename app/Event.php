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
        'contact_email',
        'contact_phone',
        'image_top',
        'image_bottom',
        'primary_color',
        'secondary_color',
        'embed',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function clients(){
        return $this->hasMany(Clients::class);
    }

}
