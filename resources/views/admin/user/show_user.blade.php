@extends('master')
@section('user','active')
@section('content')
    <div class="container">
        <br/><br/>
        <div class="row ">
            <div class="col-md-6 single_profile_background_color">
                <div class="row single_profile_margin">
                        <img class="single_profile_image" src="{{asset('assets/images/employee_image/'.$user->image)}}" alt="user">
                    <div class="col-md-12">
                        <br/>
                        <div><span class="single_profile_text_highlight">Name : </span><span class="single_profile_text_text">{{$user->name}}</span></div>
                        <div><span class="single_profile_text_highlight">Gender : </span><span class="single_profile_text_text">{{$user->gender}}</span></div>
                        <div><span class="single_profile_text_highlight">phone : </span><span class="single_profile_text_text">{{$user->phone}}</span></div>
                        <div><span class="single_profile_text_highlight">Email : </span><span class="single_profile_text_text">{{$user->email}}</span></div>
                        <div><span class="single_profile_text_highlight">Joining Date : </span><span class="single_profile_text_text">{{date('F d,Y',strtotime($user->created_at))}}</span></div>
                        <div><span class="single_profile_text_highlight">NID No. : </span><span class="single_profile_text_text">{{$user->nid}}</span></div>
                        <div><span class="single_profile_text_highlight">Position : </span><span class="single_profile_text_text">{{$user->position}}</span></div>
                        <div><span class="single_profile_text_highlight">Category : </span><span class="single_profile_text_text">{{$user->category}}</span></div>
                        <div><span class="single_profile_text_highlight">Address : </span><span class="single_profile_text_text">{{$user->address}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
