<?php

namespace Bernard\Blog\Storage\Models;

use Jenssegers\Mongodb\Model;

class Blog extends Model{
    protected $collection = 'blogs';

    protected $fillable = [
        'title','secondary_title','body'
    ];

    /**
     * Format the body of the blog.
     *
     * @param $value
     * @return string
     */
    public function getBodyAttribute($value){
        if($value){
            $Parse = new \Parsedown();

            return $Parse->text($value);
        }

        return $value;
    }
}