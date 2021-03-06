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

        if($blog){
            if($blog->status == 0){
                if(auth()->guest()){
                    return redirect('/blogs');
                }
                else{
                    if(!auth()->user()->is_admin){
                        return redirect('/blogs');
                    }
                }
            }
        }
        else{
            abort('404');
        }

        return view('blogs.show')->with(['blog' => $blog]);
    }

    /**
     * Display the article edit form.
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id){
        if(auth()->user()->is_admin){
            $blog = $this->repo->find_by_id((int)$id);

            return view('blogs.edit')->with(['blog' => $blog]);
        }

        return redirect('/blog/' . $id);
    }

    public function update(Request $request,$id){
        if(auth()->user()->is_admin){
            $blog = $this->repo->find_by_id((int)$id);

            if($blog){
                $blog->title = $request->title;
                $blog->secondary_title = $request->secondary_title;
                $blog->body = $request->body;
                $blog->save();
            }
        }

        return redirect('/blog/' . $id);
    }

    /**
     * Publish an article.
     *
     * @param $id int
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function publish($id){

        if(auth()->user()->is_admin){

            $this->repo->publish($id);

        }

        return redirect('/blog/' . $id);
    }
}