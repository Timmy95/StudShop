<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Providers\RouteServiceProvider;
use App\Department;

class DepartmentsController extends Controller
{
    public function show(Department $department) {
    	$auction = $department->auctions;
    	
    	return view('auctions.index')->with('auctions', $auction);
    }
    
}
