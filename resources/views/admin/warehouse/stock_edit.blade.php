@extends('master')
@section('warehouse','active')
@section('stock_status','active')
@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('warehouse.index')}}">Stock Status</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Edit Product Availability</h3>
            </div>
            <div class="col-md-7 col-md-offset-2">
                <div class="text-center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                {!! Form::open(['class'=>'form-horizontal','method'=>'PATCH','route'=>['warehouse.update',$edit->id]]) !!}
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Brand Name : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$edit->brand_name}}" placeholder="Enter Brand Name" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Product Name : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$edit->product_name}}" placeholder="Enter Brand Description" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Product Code : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_code" name="product_code" value="{{$edit->product_code}}" placeholder="Enter Brand Name" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Product Availability : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_availability" name="product_availability" value="{{$edit->product_availability}}" placeholder="Enter Enter Product Availability" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Submit" />
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection
