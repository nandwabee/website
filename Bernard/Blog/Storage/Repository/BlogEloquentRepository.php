<?php namespace Bernard\Blog\Storage\Repository;

use App\Events\Blog\BlogWasCreated;
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

        event(new BlogWasCreated($blog));

        return $blog;
    }

    /**
     * Find a single blog post.
     *
     * @param $unique_id int The nid of the article.
     */
    public function find_by_id($unique_id){
        $blog = Blog::where('nid',$unique_id)
            ->first();

        return $blog;
    }

    /**
     * Find the latest blog stored in the database.
     *
     * @return mixed
     */
    public function find_latest_blog(){
        $blog = Blog::orderBy('nid','desc')
            ->first();

        return $blog;
    }
}