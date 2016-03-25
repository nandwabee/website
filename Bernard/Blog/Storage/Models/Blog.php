<?php

namespace Bernard\Blog\Storage\Models;

use Jenssegers\Mongodb\Model;

class Blog extends Model{
    protected $collection = 'blogs';

    protected $fillable = ['title'];
}