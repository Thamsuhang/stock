<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StockController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function create(): View {
        $warehouses = Warehouse::all()->where('status', '=', 1)->toArray();
        $products = Product::all()->where('status', '=', 1)->toArray();
        return view('stock.form', compact('warehouses', 'products'));
    }

    public function out() {
        $warehouses = Warehouse::with('stocks')->get();
        return view('stock.stockOut', compact('warehouses'));
    }

    public function report() {
        $allWarehouses = Warehouse::select('id', 'name')->where('status', '=', 1)->get()->toArray();
        $products = Product::all()->where('status', '=', 1)->toArray();
        return view('stock.report', compact(['allWarehouses', 'products']));
    }

    public function adjust($id) {
        $stocksIn = Stock::with('warehouses', 'products')->where('warehouse_id', $id)->where('type', '=', 'in')->orderBy('id', 'desc')->get()->toArray();
        $stocksOut = Stock::with('warehouses', 'products')->where('warehouse_id', $id)->where('type', '=', 'out')->orderBy('id', 'desc')->get()->toArray();
        $allWarehouses = Warehouse::select('id', 'name')->where('status','=','1')->get()->toArray();
        $warehouses = Warehouse::find($id)->toArray();

        return view('stock.index', compact(['stocksIn', 'warehouses', 'allWarehouses', 'stocksOut']));
    }

    public function getReport(Request $request) {
        $newArray = [];
        $finalArray = [];
        //        for stockin and out according to date
        foreach ($_POST['date'] as $k => $d) {
            $stocksIn = Stock::with('warehouses', 'products');
            if (!empty($request->warehouse_id)) {
                $stocksIn = $stocksIn->where('warehouse_id', $request->waehouse_id);
            }
            if (!empty($request->product_id)) {
                $stocksIn = $stocksIn->where('product_id', $request->product_id);
            }
            $stocksIn = $stocksIn->where('type', '=', 'in')
                                 ->whereBetween('created_at', [$d, date('Y-m-d', strtotime("+1 months", strtotime($d)))])
                                 ->orderBy('id', 'desc')
                                 ->get()
                                 ->toArray();
            $newArray[$k]['stocksIn'] = $stocksIn;
            $stocksOut = Stock::with('warehouses', 'products');
            if ($request->waehouse_id !== '') {
                $stocksOut = $stocksOut->where('warehouse_id', $request->waehouse_id);
            }
            if ($request->product_id !== '') {
                $stocksOut = $stocksOut->where('product_id', $request->product_id);
            }
            $stocksOut = $stocksOut->where('type', '=', 'out')
                                   ->whereBetween('created_at', [$d, date('Y-m-d', strtotime("+1 months", strtotime($d)))])
                                   ->orderBy('id', 'desc')
                                   ->get()
                                   ->toArray();
            $newArray[$k]['stocksOut'] = $stocksOut;
            //for end of the year
        }
        // for formatting array
        foreach ($newArray['start'] as $key => $stock) {
            if(!isset($finalArray['start'][$key]['total_quantity'])) $finalArray['start'][$key]['total_quantity']=0;
            if(!isset($finalArray['start'][$key]['total_price'])) $finalArray['start'][$key]['total_price']=0;
            if(!isset($finalArray['data-set']['start'])) $finalArray['data-set']['start']=[];
            if (!empty($stock)) {
                foreach ($stock as $k => $s) {
                    $finalArray['data-set']['start'][$key]['month'][]= date('Y M d',strtotime($s['created_at']));
                    $finalArray['data-set']['start'][$key]['quantity'][]= intval($s['quantity']);
                    $finalArray['start'][$key]['total_quantity'] += $s['quantity'];
                    $finalArray['start'][$key]['total_price'] += $s['price'];
                    $finalArray['start'][$key]['year'] = date('Y-M-d',strtotime($s['created_at']));
                }
            }
        }
        foreach ($newArray['end'] as $key => $stock) {
            if(!isset($finalArray['end'][$key]['total_quantity'])) $finalArray['end'][$key]['total_quantity']=0;
            if(!isset($finalArray['end'][$key]['total_price'])) $finalArray['end'][$key]['total_price']=0;
            if(!isset($finalArray['data-set'])) $finalArray['data-set']['end']=[];
            if (!empty($stock)) {
                foreach ($stock as $k => $s) {
                    $finalArray['data-set']['end'][$key]['month'][]=date('Y M d',strtotime($s['created_at']));
                    $finalArray['data-set']['end'][$key]['quantity'][]=intval($s['quantity']);
                    $finalArray['end'][$key]['total_quantity'] += $s['quantity'];
                    $finalArray['end'][$key]['total_price'] += $s['price'];
                    $finalArray['end'][$key]['year'] = date('Y-M-d',strtotime($s['created_at']));
                }
            }
        }
        $totalStockInProductCount=Stock::all()->where('type', '=', 'in')
                                     ->whereBetween('created_at', [date('Y-m-d',strtotime($_POST['date']['start'])), date('Y-m-d', strtotime($_POST['date']['end']))])
                                     ->sum('quantity');

        $totalStockOutProductCount=Stock::all()->where('type', '=', 'out')
                                       ->whereBetween('created_at', [date('Y-m-d',strtotime($_POST['date']['start'])), date('Y-m-d', strtotime($_POST['date']['end']))])
                                       ->sum('quantity');
       $finalArray['totalStockInProductCount']=$totalStockInProductCount;
       $finalArray['totalStockOutProductCount']=$totalStockOutProductCount;
        $finalArray['start_year']=date('Y-m-d',strtotime($_POST['date']['start']));
        $finalArray['end_year']=date('Y-m-d',strtotime($_POST['date']['end']));

        $allWarehouses = Warehouse::select('id', 'name')->where('status', '=', 1)->get()->toArray();
        $products = Product::all()->where('status', '=', 1)->toArray();
        return view('stock.report', compact(['allWarehouses', 'products','finalArray','newArray']));
    }

    public function transfer(Request $request) {
        $batch_id = self::generateNumericOTP(6);
        $stock_id = $request->stock_id;
        $warehouse_id = $request->warehouse_id;
        $stockOut = Stock::find($stock_id);
        $StockIn = Stock::create(
            [
                'batch_id'     => isset($stockOut->batch_id) && $stockOut->batch_id !== '' ? $stockOut->batch_id : $batch_id,
                'warehouse_id' => $warehouse_id,
                'product_id'   => $stockOut->product_id,
                'quantity'     => $stockOut->quantity,
                'price'        => $stockOut->price
            ]);
        $stockOut->update(
            [
                'batch_id'     => isset($stockOut->batch_id) && $stockOut->batch_id !== '' ? $stockOut->batch_id : $batch_id,
                'type'         => 'out',
                'warehouse_id' => $stockOut->warehouse_id,
                'product_id'   => $stockOut->product_id,
                'quantity'     => $stockOut->quantity,
                'price'        => $stockOut->price
            ]
        );
        return redirect()->route('stocks/adjust', $stockOut->warehouse_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public static function generateNumericOTP($n) {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        // Return result
        return $result;
    }

    public function store(Request $request) {
        $batch_id = self::generateNumericOTP(6);
        $warehouse = isset($_POST['warehouse_id']) && $_POST['warehouse_id'] !== '' ? Warehouse::find($_POST['warehouse_id'])->toArray() : '';
        foreach ($_POST['product_id'] as $k => $p) {
            $product = isset($p) && $p !== '' ? Product::find($p)->toArray() : '';
            $stock = Stock::create(
                [
                    'batch_id'     => isset($_POST['batch_id']) && $_POST['batch_id'] !== '' ? $_POST['batch_id'] : $batch_id,
                    'warehouse_id' => $warehouse['id'],
                    'product_id'   => $product['id'],
                    'quantity'     => $product['quantity'],
                    'price'        => $product['price']
                ]);
        }
        return redirect()->route('stocks/adjust', $_POST['warehouse_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
