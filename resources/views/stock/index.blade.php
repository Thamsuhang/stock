@extends('layouts.app')
@section('pageTitle', ucfirst($warehouses['name']));
@section('content')

    <div class = "container">
        <div class = "row justify-content-center noPrint">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header table-header">
                        <a href = "{{route('stock-out')}}" class="btn btn-sm btn-secondary" style="float: right"><i class="fa fa-arrow-left"></i> Go Back</a>
                        {{ __('All Stocsk Under').' '.ucfirst($warehouses['name']) }}
                    </div>
                    <div class = "card-body">
                        <div class = "nav-tabs-boxed">
                            <ul class = "nav nav-tabs" role = "tablist">
                                <li class = "nav-item">
                                    <a class = "nav-link active" data-toggle = "tab" href = "#home" role = "tab" aria-controls = "home" aria-selected = "true">Current Stocks</a>
                                </li>
                                <li class = "nav-item">
                                    <a class = "nav-link s-out" data-is-init="false" data-toggle = "tab" href = "#profile" role = "tab" aria-controls = "profile" aria-selected = "false">Stocks Out</a>
                                </li>
                            </ul>
                            <div class = "tab-content">
                                <div class = "tab-pane active" id = "home" role = "tabpanel">
                                    <table id="stockIn-table" class = "table table-responsive-sm table-bordered table-striped table-sm display">
                                        <thead>
                                        <tr>
                                            <th>BatchId</th>
                                            <th>Product Name</th>
                                            <th style = "width: 200px">Product quantity</th>
                                            <th>Year</th>
                                            <th class = "noExport text-center">Transfer</th>
                                            <th class = "noExport text-center">Action</th>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($stocksIn))
                                            @foreach($stocksIn as $k=>$s)
                                                @if(isset($s['products']) && $s['products']!=='')
                                                    <tr>
                                                        <td class = "batch-id">{{$s['batch_id']}}</td>
                                                        <td class = "product-title">{{$s['products']['title']}}</td>
                                                        <td class = "product-quantity">{{$s['quantity']}}</td>
                                                        <td class = "created-at">{{date('Y',strtotime($s['created_at']))}}</td>
                                                        <td class = "formatted-date d-none">{{date('M,D Y H:i a',strtotime($s['created_at']))}}</td>
                                                        <td class = "product-description d-none">{{$s['products']['description']}}</td>
                                                        <td class = "product-price d-none">{{$s['products']['price']}}</td>
                                                        <td>
                                                            <form action = "{{route('stocks.transfer')}}" method = "post">
                                                                @csrf
                                                                <input type = "hidden" name = "stock_id" value = "{{$s['id']}}">
                                                                <div class = "form-group row" style = "justify-content: center">
                                                                    <div class = "col-md-12">
                                                                        <div class = "input-group">
                                                                            <select name = "warehouse_id" id = "input2-group2" class = "form-control">
                                                                                @foreach($allWarehouses as $k=>$warehouse)
                                                                                    @if($warehouse['id'] !== $s['warehouse_id'])
                                                                                        <option value = "{{$warehouse['id']}}">{{$warehouse['name']}}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                            <span class = "input-group-append">
                                                        <button class = "btn btn-primary" type = "submit">Submit</button></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td class = "text-center">
                                                            <button data-toggle = "modal" data-target = ".bd-example-modal-lg" class = "btn btn-primary btn-sm d-inline-block create-report">
                                                                <i class = "fa fa-print"></i>
                                                            Create Bill
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan = "2" style = "text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class = "tab-pane" id = "profile" role = "tabpanel">
                                    <table id="stockOut-table" class = "table table-responsive-sm table-bordered table-striped table-sm display">
                                        <thead>
                                        <tr>
                                            <th>BatchId</th>
                                            <th>Product Name</th>
                                            <th style = "width: 45px">Product quantity</th>
                                            <th>Year</th>
                                            <th class = "noExport text-center">Action</th>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                            <th class="d-none"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($stocksOut)): ?>
                                        @foreach($stocksOut as $k=>$s)
                                            <tr>
                                                <td class="batch-id">{{$s['batch_id']}}</td>
                                                <td class="product-title">{{$s['products']['title']}}</td>
                                                <td class="product-quantity">{{$s['quantity']}}</td>
                                                <td>{{date('Y',strtotime($s['created_at']))}}</td>
                                                <td class = "text-center">
                                                    <button data-toggle = "modal" data-target = ".bd-example-modal-lg" class = "btn btn-primary btn-sm d-inline-block create-report">
                                                        <i class = "fa fa-print"></i>
                                                        Create Bill
                                                    </button>
                                                </td>
                                                <td class = "formatted-date d-none">{{date('M,D Y H:i a',strtotime($s['created_at']))}}</td>
                                                <td class = "product-description d-none">{{$s['products']['description']}}</td>
                                                <td class = "product-price d-none">{{$s['products']['price']}}</td>
                                            </tr>
                                        @endforeach
                                        <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan = "2" style = "text-align:right">Total:</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal fade bd-example-modal-lg" tabindex = "-1" role = "dialog" aria-labelledby = "myLargeModalLabel" aria-hidden = "true">
            <div class = "modal-dialog modal-lg">
                <div class = "modal-content">

                        <div class = "card-body">
                            <div id="p-wrapper">
                                    <div class = "row">
                                        <div class = "col-12 text-center">
                                            <h2 >
                                                Invoice for {{$warehouses['name']}}
                                            </h2>
                                            <p><b>Date:</b><span class="page-header"></span></p>
                                        </div>
                                        <div class = "col-12 invoice-col">

                                            <p><b>Warehouse Location:</b> <span class="p-warehouse-location">{{$warehouses['location']}}</span><br></p>
                                            <p><b>Batch ID:</b> <span class="p-batch-id"></span><br></p>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-xs-12 table-responsive">
                                            <table class = "table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Product name</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="p-product-name">product1</td>
                                                    <td class="p-product-price">79879</td>
                                                    <td class="p-product-quantity">1</td>
                                                    <td class="p-total-amount"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class = "row">
                                        <div class = "col-xs-6 ml-auto" style = "margin-right: 50px">
                                            <div class = "table-responsive">
                                                <table class = "table">
                                                    <tbody>
                                                    <tr>
                                                        <th>Gross Amount:</th>
                                                        <td class="p-gross-amount"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vat Charge (13%)</th>
                                                        <td class="p-vat"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Net Amount:</th>
                                                        <td class="p-net-amount"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                            </div>
                            <div class="col-12 text-right">
                                <button class="btn btn-sm btn-primary print-invoice" onclick="window.print('#p-wrapper')"> <i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
@endsection
