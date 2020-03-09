@extends('master')
@section('user','active')
@section('user_vendor','active')
@section('content')
    <h2 class="success_text">
        @if(Session::has('success_vendor'))
            {{Session::get('success_vendor')}}
        @endif
    </h2>
    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="card_heading_design">Vendor</div>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <div class="search_margin">
                {!! Form::open(['route' => 'exist.vendor.search','method' => 'POST']) !!}
                <div class="input-group">
                    <input type="text" name="user_search" class="form-control" placeholder="Search...">
                    <input type="hidden" name="user_category_code" value="1"/>
                    <span class="input-group-btn"><button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <br/>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if($vendors->count() ==! 0)
                @foreach($vendors as $vendor)
                <div class="col-md-3 card_box card-1">
                    <p><img class="user_image_design" src="{{asset('assets/images/employee_image/'.$vendor->image)}}" alt=""></p>
                    <p>Name : {{$vendor->name}}</p>
                    <p>Email : {{$vendor->email}}</p>
                    <p>Phone : {{$vendor->phone}}</p>
                    <p>Position : {{$vendor->position}}</p>
                    <p>Category : {{$vendor->category}}</p>
                    <p>Role : {{$vendor->role}}</p>
                    <div class="text-center">
                        <table class="table_left_margin">
                            <tr>
                                <td><a class="btn btn-success" href="{{route('user.show',$vendor->first_name.'_'.$vendor->last_name.'_'.$vendor->id)}}">Details</a></td>
                                <td><a class="btn btn-primary" href="{{route('user.edit',$vendor->id)}}">Edit</a></td>
                                <td>
                                    {!! Form::open(['route' => ['exist.vendor.delete'], 'method' => 'POST']) !!}
                                    <input type="hidden" name="id" value="{{$vendor->id}}"/>
                                    <input type="submit" class="btn btn-danger" value="delete"/>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                    @endforeach
                    @else
                    <div class="col-md-12 text-center">
                        <div class="card_box_two card-2">
                            <p><img class="" src="{{asset('assets/images/not_found/not_found.jpg')}}" alt=""></p>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
    {!! $vendors->links() !!}
@endsection