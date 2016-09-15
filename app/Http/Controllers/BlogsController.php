<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Blog;
//use App\Http\Requests;

class BlogsController extends Controller
{
	public function __construct() {
		//$this->middleware('auth', ['only' => 'create']);
		$this->middleware('moderator', ['only' => 'create']);
	}
	
	/**
	 * Берет все посты из таблицы blogs, сортирует по дате создания,
	 * разбивает на части по 10 постов на страницу и передает в на представление.
	 * 
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
    public function index() {
    	//dd($blogs = DB::table('blogs')->latest('created_at'))->simplePaginate('10');//dd($blogs->created_at);
    	$blogs = \App\Blog::simplePaginate('10')->sortByDesc('created_at');
		return view('news.index', compact('blogs'));
	}

	/**
	 * СЛужит для отображения отдельного новостного поста.
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
