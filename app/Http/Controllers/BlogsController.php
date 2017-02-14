<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Blog;

class BlogsController extends Controller
{
	public function __construct() {
		$this->middleware('moderator', ['only' => 'create']);
	}
	
	/**
	 * Отображает все новостные посты
	 * 
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
    public function index() {
    	$blogs = Blog::latest('created_at')->paginate(3);

		return view('news.index', compact('blogs'));
	}

	/**
	 * Отображает отдельный новостной пост
	 * 
	 * @param integer $id
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function show($id) {
		$blog = Blog::findOrFail($id);
		 
		return view('news.show', compact('blog'));
	}
	
	public function create() {
		return view('news.create');
	}
	
	/**
	 * Сохраняет пост в БД.
	 * 
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request) {
		$blog =	$request->all();
		$blog['body'] = preg_replace("#(\\\r|\\\r\\\n|\\\n)#", "<br/>",  $blog['body']);

		Blog::create($blog);

		return redirect('news');
	}
}
