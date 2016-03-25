<?php namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Bernard\Blog\Storage\Repository\BlogEloquentRepository;
use Illuminate\Http\Request;

class BlogController extends Controller{
    function __construct()
    {
        $this->repo = new BlogEloquentRepository();
    }

    /**
     * Store a new blog.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $blog = $this->repo->store($request);

        return redirect('/blogs');
    }

    public function create(){
        return view('blogs.create');
    }
}