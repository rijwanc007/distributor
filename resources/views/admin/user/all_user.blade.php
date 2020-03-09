@extends('master')
@section('user','active')
@section('all_user','active')
@section('content')
    <h2 class="success_text">
        @if(Session::has('success'))
            {{Session::get('success')}}
            @endif
    </h2>
    <div class="row text-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="card_heading_design">All Users</div>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <div class="search_margin">
                {!! Form::open(['route' => 'exist.user.search','method' => 'POST']) !!}
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
                    @if($users->count() ==! 0)
                    @foreach($users as $user)
                        <div class="col-md-3 card_box card-1">
                            <p><img class="user_image_design" src="{{asset('assets/images/employee_image/'.$user->image)}}" alt=""></p>
                            <p>Name : {{$user->name}}</p>
                            <p>Email : {{$user->email}}</p>
                            <p>Phone : {{$user->phone}}</p>
                            <p>Position : {{$user->position}}</p>
                            <p>Category : {{$user->category}}</p>
                            <p>Role : {{$user->role}}</p>
                            <div class="text-center">
                                <table class="table_left_margin">
                                    <tr>
                                        <td><a class="btn btn-success" href="{{route('user.show',$user->first_name.'_'.$user->last_name.'_'.$user->id)}}">Details</a></td>
                                        <td><a class="btn btn-primary" href="{{route('all.user.edit',$user->id)}}">Edit</a></td>
                                        <td>
                                            {!! Form::open(['route' => ['user.destroy',$user->id], 'method' => 'DELETE']) !!}
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
    {!! $users->links() !!}
    @endsection