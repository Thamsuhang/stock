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
                    <div class = "card-header">Create Warehouse</div>
                    <div class = "card-body">
                        <form method = "post" action = "{{route('admin.warehouses.store')}}" >
                            @csrf
                            <div class = "form-group">
                                <label for = "name">Name</label>
                                <input class = "form-control" id = "name" type = "text" name = "name" value = "{{old('name')}}">
                            </div>
                            <div class = "row">
                                <div class = "form-group col-sm-6">
                                    <label for = "location">Location</label>
                                    <input class = "form-control" id = "location" type = "text" name = "location" value = "{{old('location')}}">
                                </div>
                                <div class = "form-group col-sm-6">
                                    <label for = "status">Status</label>
                                    <select name = "status" id = "status" class="form-control">
                                        <option value = "1">Active</option>
                                        <option value = "0">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "description">Warehouse Description</label>
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
