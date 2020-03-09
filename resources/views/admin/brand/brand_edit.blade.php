@extends('master')
@section('product','active')
@section('brand_index','active')
@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('brand.index')}}">All Brand</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Edit Brand</h3>
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
                {!! Form::open(['class'=>'form-horizontal','method'=>'PATCH','route'=>['brand.update',$edit->id]]) !!}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Name : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$edit->brand_name}}" placeholder="Enter Brand Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Description : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand_description" name="brand_description" value="{{$edit->brand_description}}" placeholder="Enter Brand Description" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="gender">Status :</label>
                    <div class="col-sm-10">
                        <select class="select_product_category_design" name="brand_status" required>
                            <option @if($edit->brand_status == 'active') selected="selected" @endif>active</option>
                            <option @if($edit->brand_status == 'deactivate') selected="selected" @endif>deactivate</option>
                        </select>
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

