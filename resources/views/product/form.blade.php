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
                    <div class = "card-header">Create Product</div>
                    <div class = "card-body">
                        <form method = "post" action = "{{route('admin.products.store')}}" >
                            @csrf
                            <div class = "row">
                                <div class = "form-group col-sm-6">
                                    <label for = "title">Product Name</label>
                                    <input class = "form-control" id = "title" type = "text" name = "title" value = "{{old('title')}}">
                                </div>
                                <div class = "form-group col-sm-6">
                                    <label for = "status">Status</label>
                                    <select name = "status" id = "status" class="form-control">
                                        <option value = "1">Active</option>
                                        <option value = "0">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "form-group col-sm-6">
                                    <label for = "quantity">Product Quantity</label>
                                    <input class = "form-control" id = "quantity" type = "number" name = "quantity" value = "{{old('quantity')}}">
                                </div>
                                <div class = "form-group col-sm-6">
                                    <label for = "price">Product price</label>
                                    <input class = "form-control" id = "price" type = "number" name = "price" value = "{{old('price')}}">
                                </div>

                            </div>
                            <div class = "form-group">
                                <label for = "description">Product Description</label>
                                <textarea class = "form-control" id = "description" type = "text" name ="description">{{old('description')}}</textarea>
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
