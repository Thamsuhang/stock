@extends('layouts.app')
@section('pageTitle', ucfirst($warehouses['name']));
@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">{{ __('All Stocsk Under').' '.ucfirst($warehouses['name']) }}</div>
                    <div class = "card-body">
                        <div class="nav-tabs-boxed">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current Stocks</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Stocks Out</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <table class = "table table-responsive-sm table-bordered table-striped table-sm display stock-table">
                                        <thead>
                                        <tr>
                                            <th>BatchId</th>
                                            <th>Product Name</th>
                                            <th style = "width: 200px">Product quantity</th>
                                            <th>Year</th>
                                            <th class = "noExport text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($stocksIn))
                                        @foreach($stocksIn as $k=>$s)
                                            @if(isset($s['products']) && $s['products']!=='')
                                            <tr>
                                                <td>{{$s['batch_id']}}</td>
                                                <td>{{$s['products']['title']}}</td>
                                                <td>{{$s['quantity']}}</td>
                                                <td>{{date('Y',strtotime($s['created_at']))}}</td>
                                                <td>
                                                    <form action = "{{route('stocks.transfer')}}" method="post">
                                                        @csrf
                                                        <input type = "hidden" name="stock_id" value="{{$s['id']}}">
                                                        <div class = "form-group row" style = "justify-content: center">
                                                            <div class="col-md-12">
                                                                <div class = "input-group">
                                                                    <select name = "warehouse_id" id = "input2-group2" class="form-control">
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
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <table class = "table table-responsive-sm table-bordered table-striped table-sm display stock-table">
                                        <thead>
                                        <tr>
                                            <th>BatchId</th>
                                            <th>Product Name</th>
                                            <th style = "width: 45px">Product quantity</th>
                                            <th>Year</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($stocksOut)): ?>
                                        @foreach($stocksOut as $k=>$s)
                                            <tr>
                                                <td>{{$s['batch_id']}}</td>
                                                <td>{{$s['products']['title']}}</td>
                                                <td>{{$s['quantity']}}</td>
                                                <td>{{date('Y',strtotime($s['created_at']))}}</td>
                                            </tr>
                                        @endforeach
                                        <?php endif; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan = "2" style = "text-align:right">Total:</th>
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
@endsection
