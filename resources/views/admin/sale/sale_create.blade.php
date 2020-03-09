@extends('master')
@section('sale','active')
@section('sale_index','active')
@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('sale.index')}}">All Sale</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Create Sale</h3>
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
                {!! Form::open(['class'=>'form-horizontal','method'=>'POST','enctype' => 'multipart/form-data','route'=>['sale.store']]) !!}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Upload File : </label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="upload_file" name="upload_file" placeholder="Enter Tax Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="sale_message">Message :</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" style="resize: none" rows="5" id="sale_message" name="sale_message"></textarea>
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
