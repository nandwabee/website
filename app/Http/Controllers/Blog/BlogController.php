<?php namespace App\Http\Controllers\Blog;

use Auth;
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
        $blog = $this->repo->store($request->except(['_token']));

        return redirect('/blogs');
    }

    /**
     * Display a form for adding new blog content.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('blogs.create');
    }

    /**
     * Display the blog roll
     */
    public function index(){
        $data = [];

        if(auth()->guest()){
            $data['articles'] = $this->repo->find_published_articles();
        }

        if(Auth::check()){
            $data['articles'] = $this->repo->find_articles_for_admin();
        }

        return view('blogs.index')->with($data);
    }

    /**
     * Display an article.
     *
     * @param $id int
     * @return $this
     */
    public function show($id){
        $blog = $this->repo->find_by_id((int)$id);

        return view('blogs.show')->with(['blog' => $blog]);
    }
}