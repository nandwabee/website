<?php namespace Bernard\Blog\Storage\Repository;

use Bernard\Blog\Storage\Models\Blog;

class BlogEloquentRepository{
    /**
     * Store a single blog post.
     *
     * @param $payload array
     *
     * @return \Bernard\Blog\Storage\Models\Blog
     */
    public function store($payload){
        $blog = Blog::create($payload);
        
        return $blog;
    }
}