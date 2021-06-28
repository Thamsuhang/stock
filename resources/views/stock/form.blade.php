@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    @if ($errors->any())
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class = "card-header">Add new Stock</div>
                    <div class = "card-body">
                        <form method = "post" action = "{{route('admin.stocks.store')}}">
                            @csrf
                            <div class = "form-group">
                                <label for = "batch_id">Batch id</label>
                                <input class = "form-control" id = "batch_id" type = "number" name = "batch_id" value = "{{old('batch_id')}}" placeholder="Any spaces will be removed while storing ">
                            </div>
                            <div class = "form-group">
                                <label for = "warehouse_id">Warehouses</label>
                                <select name = "warehouse_id" id = "warehouse_id" class = "form-control" required>
                                    @foreach($warehouses as $k=>$w)
                                        <option value = "{{$w['id']}}">{{$w['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class = "form-group">
                                <label for = "product_id">Product</label>
                                <select name = "product_id[]" id = "product_id" class = "form-control select2" multiple="multiple" required>
                                    <option disabled value = "">Select a Product</option>
                                    @foreach($products as $k=>$w)
                                        <option value = "{{$w['id']}}">{{$w['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class = "form-group">
                                <button type = "submit" class = "btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
