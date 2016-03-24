<?php

namespace App\Events\Blog;

use Bernard\Blog\Storage\Models\Blog;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BlogWasCreated extends Event
{
    use SerializesModels;

    public $blog;

    /**
     * Create a new event instance.
     *
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
