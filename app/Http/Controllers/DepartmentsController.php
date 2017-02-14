<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Providers\RouteServiceProvider;
use App\Department;

class DepartmentsController extends Controller
{
    public function show(Department $department) {
    	return view('auctions.index')->with('auctions', $department->auctions);
    }
    
}
