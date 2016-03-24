<?php

namespace App\Listeners\Blog;

use App\Events\Blog\BlogWasCreated;
use Bernard\Blog\Storage\Repository\BlogEloquentRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->repo = new BlogEloquentRepository();
    }

    /**
     * Handle the event.
     *
     * @param  BlogWasCreated  $event
     * @return void
     */
    public function handle(BlogWasCreated $event)
    {
        $blog = $event->blog;

        //Lets store the unique id
        if($this->repo->find_latest_blog()){
            $blog->nid = $this->repo->find_latest_blog()->nid + 1;
        }
        else{
            $blog->nid = 1;
        }

        $blog->save();

    }
}
