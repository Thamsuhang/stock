@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class = "card-header">Edit Product {{$product->title}}</div>
                    <div class = "card-body">
                        <form method = "post" action = "{{route('admin.products.update',$product)}}" >
                            @csrf
                            @method('PUT')
                            <div class = "row">
                                <div class = "form-group col-sm-6">
                                    <label for = "title">Product Name</label>
                                    <input class = "form-control" id = "title" type = "text" name = "title" value = "{{$product->title}}">
                                </div>
                                <div class = "form-group col-sm-6">
                                    <label for = "status">Status</label>
                                    <select name = "status" id = "status" class="form-control">
                                        <option {{ ($product->status == 1) ? 'selected="selected"' : ''}} value = "1">Active</option>
                                        <option {{ ($product->status == 0) ? 'selected="selected"' : ''}}  value = "0">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "form-group col-sm-6">
                                    <label for = "quantity">Product Quantity</label>
                                    <input class = "form-control" id = "quantity" type = "number" name = "quantity" value = "{{$product->quantity}}">
                                </div>
                                <div class = "form-group col-sm-6">
                                    <label for = "price">Product price</label>
                                    <input class = "form-control" id = "price" type = "number" name = "price" value = "{{$product->price}}">
                                </div>

                            </div>
                            <div class = "form-group">
                                <label for = "description">Product Description</label>
                                <textarea class = "form-control" id = "description" type = "text" name ="description">{{$product->description}}</textarea>
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
