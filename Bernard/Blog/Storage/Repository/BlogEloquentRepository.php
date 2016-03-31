<?php namespace Bernard\Blog\Storage\Repository;

use App\Events\Blog\BlogWasCreated;
use Bernard\Blog\Storage\Models\Blog;

class BlogEloquentRepository
{
    /**
     * Store a single blog post.
     *
     * @param $payload array
     *
     * @return \Bernard\Blog\Storage\Models\Blog
     */
    public function store($payload)
    {
        $blog = Blog::create($payload);

        event(new BlogWasCreated($blog));

        return $blog;
    }

    /**
     * Find a single blog post.
     *
     * @param $unique_id int The nid of the article.
     */
    public function find_by_id($unique_id)
    {
        $blog = Blog::where('nid', $unique_id)
            ->first();

        return $blog;
    }

    /**
     * Find the latest blog stored in the database.
     *
     * @return mixed
     */
    public function find_latest_blog()
    {
        $blog = Blog::orderBy('nid', 'desc')
            ->first();

        return $blog;
    }

    /**
     * Get the latest published blog.
     *
     * @return mixed
     */
    public function find_latest_published_blog()
    {
        $blog = Blog::where('status', 1)
            ->orderBy('published_at', 'desc')
            ->first();

        return $blog;
    }

    /**
     * Get a paginated list of articles for the unauthenticated users.
     *
     */
    public function find_published_articles()
    {
        $articles = Blog::where('status', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(15);

        return $articles;
    }

    /**
     * Get a paginated list of all articles for the admin.
     *
     * @todo segment the published and unpublished articles more cleanly.
     */
    public function find_articles_for_admin()
    {
        $articles = Blog::orderBy('created_at', 'desc')
            ->paginate(15);

        return $articles;
    }

    /**
     * Publish/Unpublish a single article
     */
    public function publish($id)
    {
        $blog = $this->find_by_id((int)$id);

        if ($blog) {

            if ($blog->status == 1) {
                $blog->status = 0;
                $blog->unpublished_at = new \MongoDate(time());
            } else {
                $blog->status = 1;

                if(!$blog->published_at){
                    $blog->published_at = new \MongoDate(time());
                }
            }

            $blog->save();
        }

        //Fire an event here
    }

}