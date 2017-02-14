<?php

namespace App\Http\Controllers;

use DB;
use App\Auction;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\AuctionRequest;


class AuctionsController extends Controller
{

	public function __construct() {
		$this->middleware('auth', ['only' => 'create']);
		$this->middleware('seller', ['only' => 'edit']);
	}
	
	/**
	 * Список всех товаров, разбитый по 5 товара на страницу
	 * 
	 * @return \Illuminate\View\View
	 */
    public function index() {
        $auctions = Auction::latest('created_at')->paginate(5);

		return view('auctions.index')->with('auctions', $auctions);
    }

    /**
     * Начальная страница
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome() {
        $auctions = Auction::latest('created_at')->simplePaginate(3);

    	return view('welcome')->with('auctions', $auctions);
    }

    /**
     * Получаем доступ к конкретному посту
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Auction $auction) {
    	return view('auctions.show')->with('auction', $auction);
    }


    /**
     * Возвращаем страницу с формой создания товара
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
		$departments = Department::lists('name', 'id');

    	return view('auctions.create', compact('departments'));
    }
    
    /**
     * Сохраняем товар на сервер
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(AuctionRequest $request) {
            $auction = $request->all();
            $auction['image'] = $this->saveAuctionImage($request, $auction);
            $auction = new Auction($auction);

            \Auth::user()->auctions()->save($auction);

            $auction->departments()->attach($request->input('departmentList'));

            return redirect('auctions');
    }

    /**
     * Возвращаем страницу с формой редактирования товара
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Auction $auction) {
    	$departments = Department::lists('name', 'id');

    	return view('auctions.edit', compact('auction', 'departments'));
    }

    /**
     *
     * @param Auction $auction
     * @param AuctionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Auction $auction, AuctionRequest $request) {
        $requestData = $request->all();
        $requestData['image'] = $this->saveAuctionImage($request, $auction);

    	$auction->update($requestData);

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
