<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWarehouseRequest;
use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use \Illuminate\Http\RedirectResponse;
class WarehouseController extends Controller
{

    public function index():View
    {
       $all= Warehouse::all();
        return view('warehouse.index',compact('all'));
    }


    public function create():View {
        return view('warehouse.form');
    }

    public function store(WarehouseRequest $request):RedirectResponse
    {
        $warehouse=Warehouse::create($request->validated());
        return redirect()->route('admin.warehouses.edit', [
            $warehouse
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Warehouse $warehouse):View
    {
        return view('warehouse.edit',compact('warehouse'));
    }

    public function update(UpdateWarehouseRequest $request,Warehouse $warehouse):RedirectResponse
    {
        $warehouse->update($request->validated());
        return redirect()->route('admin.warehouses.edit', [
            $warehouse
        ]);
    }

    public function destroy(Warehouse $warehouse):RedirectResponse
    {
        $warehouse->delete();
        return redirect()->route('admin.warehouses.index');
    }
}
