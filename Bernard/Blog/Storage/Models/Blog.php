<?php

namespace Bernard\Blog\Storage\Models;

use Jenssegers\Mongodb\Model;

class Blog extends Model{
    protected $collection = 'blogs';

    protected $fillable = [
        'title','secondary_title','body'
    ];

    public function getBodyAttribute($value){
        if($value){
            $Parse = new \Parsedown();

            return $Parse->text($value);
        }

        return $value;
    }
}