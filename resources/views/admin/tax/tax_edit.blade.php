@extends('master')
@section('product','active')
@section('tax_index','active')
@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('tax.index')}}">All Tax</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Edit Tax</h3>
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
                {!! Form::open(['class'=>'form-horizontal','method'=>'PATCH','route'=>['tax.update',$edit->id]]) !!}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Title : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tax_title" name="tax_title" value="{{$edit->tax_title}}" placeholder="Update Tax Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Value : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tax_value" name="tax_value" value="{{$edit->tax_value}}" placeholder="Update Tax Value" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="gender">Status :</label>
                    <div class="col-sm-10">
                        <select class="select_product_category_design" name="tax_status" required>
                            <option @if($edit->tax_status == 'active') selected="selected" @endif>active</option>
                            <option @if($edit->tax_status == 'inactive') selected="selected" @endif>inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Update" />
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

