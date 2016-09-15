<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Auction;
use App\Http\Requests\AuctionRequest;
use App\Department;



class AuctionsController extends Controller
{
	
	/**
	 * Middleware лужит для ограничения доступа к определенным страницам
	 * для определенных групп пользователей. В данном примере ограничиваем
	 * доступ к форме создания товара для неавторизированных пользователей.
	 */
	public function __construct() {
		$this->middleware('auth', ['only' => 'create']);
		$this->middleware('seller', ['only' => 'edit']);
	}
	
	/**
	 * Берем все товары из БД, сортируем по дате создания и разбиваем по 4
	 * штуки на страницу. И передаем информацию на представление.
	 * 
	 * @return \Illuminate\View\View
	 */
    public function index() {
    	$auctions = DB::table('auctions')->latest('created_at')->simplePaginate(4);
		return view('auctions.index')->with('auctions', $auctions);
    }
    
    public function welcome() {
    	$auctions = DB::table('auctions')->latest('created_at')->simplePaginate(3);
    	return view('welcome')->with('auctions', $auctions);
    }
    
    /**
     * Получаем доступ к конкретному посту
     * 
     * @param integer $id
     */
    public function show($id) {
    	$auction = Auction::findOrFail($id);
    	return view('auctions.show')->with('auction', $auction);
    }
    
	public function create() {
		$departments = Department::lists('name', 'id');
    	return view('auctions.create', compact('departments'));
    }
    
    /**
     * Получаем тело запроса, перемещаем картинку на сервер
     * и заносим в бд всю информацию, включая путь к файлу картинки.
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(AuctionRequest $request) {
    	//$request->input('departments');
    	
    	$auction = $request->all();
    	$auction['image'] = $this->saveAuctionImage($request, $auction);
    	$auction = new Auction($auction);
    	
    	\Auth::user()->auctions()->save($auction);
    	
    	$auction->departments()->attach($request->input('departmentList'));
    	
    	return redirect('auctions');
    }
    
    public function edit($id) {
    	$auction = Auction::findOrFail($id);
    	$departments = Department::lists('name', 'id');
    	//dd($departments);
    	return view('auctions.edit', compact('auction', 'departments'));
    }
    
    /**
     * 
     * @param unknown $id
     * @param AuctionRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update($id, AuctionRequest $request) {
    	$auction = Auction::findOrFail($id);
    	$auction->title = $request->title;
    	$auction->body = $request->body;
    	$auction->price = $request->price;
    	$auction->image = $this->saveAuctionImage($request, $auction);
    	
    	$auction->update();
    	
    	//DB::delete('delete from auction_department where auction_id = ?', array($auction->id));
    	$auction->departments()->sync($request->input('departmentList'));
    	
    	return redirect('auctions');
    }
    
    /**
     * Проверяем, прикреплено ли изображение к запросу, и если да,
     * обрабатываем его.
     *
     * @param \App\Http\Requests\AuctionRequest $request
     * @param unknown $auction
     */
    private function saveAuctionImage(\App\Http\Requests\AuctionRequest $request, $auction)
    {
    	if ($request->hasFile('image'))
    	{
    		$file = $request->file('image');
    		$name = 'uploads/' . time() . '-' . $file->getClientOriginalName();
    		$file->move(public_path() . '/uploads/', $name);
    		return $name;
    	} else {
    		return 0;
    	}
    }
}
