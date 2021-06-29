<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stocksIn= Stock::all()->where('type','=','in')->count();
        $stocksOut= Stock::all()->where('type','=','in')->count();
        $warehouseActive= Warehouse::all()->where('status','=','1')->count();
        $warehouseInActive= Warehouse::all()->where('status','=','0')->count();
        $productActive= Product::all()->where('status','=','1')->count();
        $productInActive= Product::all()->where('status','=','0')->count();
        $stats=[
            'stocksIn'=>$stocksIn,
            'stocksOut'=>$stocksOut,
            'warehouseActive'=>$warehouseActive,
            'warehouseInActive'=>$warehouseInActive,
            'productActive'=>$productActive,
            'productInActive'=>$productInActive
        ];
        return view('home',compact('stats'));
    }
}
