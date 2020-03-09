@extends('master')
@section('product','active')
@section('tax_index','active')
@section('content')
    @php
        $s = 1;
    @endphp
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('tax.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Tax</a>
            </div>
        </div>
        @if(Session::has('success'))
            <h3 class="success_text">{{Session::get('success')}}</h3>
        @endif
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="search_margin">
                    {!! Form::open(['route' => 'exist.brand.search','method' => 'POST']) !!}
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <span class="input-group-btn"><button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Tax Title</th>
                        <th>Tax value</th>
                        <th>status</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($taxes->count() ==! 0)
                    @foreach($taxes as $tax)
                    <tr>
                        <td>{{$s++}}</td>
                        <td>{{$tax->tax_title}}</td>
                        <td>{{$tax->tax_value}}</td>
                        <td>{{$tax->tax_status}}</td>
                        <td>
                            <a class="btn btn-info btn-xs btn-block product_edit_button" href="{{route('tax.edit',$tax->id)}}">Edit</a>
                            {!! Form::open(['route'=>['tax.destroy',$tax->id],'method' => 'DELETE']) !!}
                            <input type="submit" class="btn btn-danger btn-xs btn-block" value="Delete"/>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">No Tax Create Yet</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {!! $taxes->links() !!}
            </div>
        </div>
    </div>
@endsection
