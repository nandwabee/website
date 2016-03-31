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

    /**
     * Format the post date of an article.
     *
     * @param $value
     * @return mixed
     */
    public function getCreatedAtAttribute($value){
        return date('d F Y',$value->sec);
    }

    /**
     * Format the publishing date.
     *
     * @param $value
     * @return bool|string
     */
    public function getPublishedAtAttribute($value){
        if($value){
            return date('d F Y',$value->sec);
        }
        return $value;
    }
}