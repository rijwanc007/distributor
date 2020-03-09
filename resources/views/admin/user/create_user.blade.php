@extends('master')
@section('user','active')
@section('create_user','active');
@section('content')
  <div class="container">
      <div class="row text-center">
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
             <h2 class="text-center">User Create</h2>
             {!! Form::open(['class'=>'form-horizontal','method'=>'POST','route'=>['user.store'],'enctype' => 'multipart/form-data']) !!}
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="email">First Name:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Last Name:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="gender">Gender :</label>
                     <div class="col-sm-10">
                         <select class="user_role_option" name="gender" required>
                             <option value="male">Male</option>
                             <option value="female">Female</option>
                         </select>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="image">Image :</label>
                     <div class="col-sm-10">
                         <input type="file" id="image" class="form-control" name="image" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="email">Email:</label>
                     <div class="col-sm-10">
                         <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="phone">Phone No:</label>
                     <div class="col-sm-10">
                         <input type="number" id="phone" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="nid">NID No:</label>
                     <div class="col-sm-10">
                         <input type="number" id="nid" class="form-control" name="nid" placeholder="Enter National ID Number" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="address">Address :</label>
                     <div class="col-sm-10">
                         <input type="text" id="address" class="form-control" name="address" placeholder="Ex : 44/2,polton ,dhaka-1205" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="position">Position :</label>
                     <div class="col-sm-10">
                         <input type="text" id="position" class="form-control" name="position" placeholder="Enter Your User Position" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="category">Category :</label>
                     <div class="col-sm-10">
                         <select class="user_role_option" name="category" required>
                             <option value="employee">Employee</option>
                             <option value="vendor">Vendor</option>
                             <option value="distributor">Distributor</option>
                         </select>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="role">Role :</label>
                     <div class="col-sm-10">
                         <select class="user_role_option" name="role" required>
                             <option value="test">test</option>
                         </select>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="pwd">Password:</label>
                     <div class="col-sm-10">
                         <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
                     <div class="col-sm-10">
                         <input type="password" id="confirm_password" class="form-control confirm_password_margin" name="confirm_password" placeholder="Retype Your Password Again" required>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                         <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit" />
                     </div>
                 </div>
            {!! Form::close() !!}
         </div>
      </div>
  </div>
@endsection
