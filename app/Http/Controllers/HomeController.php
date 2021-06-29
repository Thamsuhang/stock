<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Warehouse;
use Carbon\Carbon;
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
        $lastYear = date("Y-m-d", strtotime("-1 years"));
        $thisyear = date("Y-m-d");
        $dateS = new Carbon($lastYear);
        $dateE = new Carbon($thisyear);
        $stocksInThisYear= Stock::all()->where('type','=','in')->whereBetween('created_at', [$dateS->format('Y-m-d')." 00:00:00", $dateE->format('Y-m-d')." 23:59:59"])->sum('quantity');
        $totalStocks= Stock::all()->where('type','=','in')->sum('quantity');

        $warehouseActive= Warehouse::all()->where('status','=','1')->count();
        $warehouseInActive= Warehouse::all()->where('status','=','0')->count();
        $productActive= Product::all()->where('status','=','1')->count();
        $productInActive= Product::all()->where('status','=','0')->count();
        $stats=[
            'stocksInThisYear'=>$stocksInThisYear,
            'totalStocks'=>$totalStocks,
            'warehouseActive'=>$warehouseActive,
            'warehouseInActive'=>$warehouseInActive,
            'productActive'=>$productActive,
            'productInActive'=>$productInActive
        ];
        return view('home',compact('stats'));
    }
}
