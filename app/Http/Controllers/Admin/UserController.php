<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(24);
        return view('admin.user.all_user',compact('users'));
    }
    public function create()
    {
        return view('admin.user.create_user');
    }
    public function store(Request $request)
    {
        if($request->password != $request->confirm_password){
            $request->validate([
                'password' => 'confirmed',
            ]);
        }
        $request->validate([
            'email' => 'unique:users',
            'nid' => 'required|min:13',
        ]);
        $user_image = $request->file('image');
        $user_image_name = time().'.'.$user_image->getClientOriginalExtension();
        $user_image->move(public_path().'/assets/images/employee_image/',$user_image_name);
        User::create([
           'name' => $request->first_name.' '.$request->last_name,
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'gender' => $request->gender,
            'image' => $user_image_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid' => $request->nid,
            'address' => $request->address,
            'position' => $request->position,
            'category' => $request->category,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        Session::flash('success','User Added Successfully To The System');
        return redirect('user');
    }
    public function show($id)
    {
        $full_name = explode('_',$id);
        $find_id = end($full_name);
        $user = User::find($find_id);
        return view('admin.user.show_user',compact('user'));
    }
    public function edit($id)
    {
        $edit = User::find($id);
        return view('admin.user.edit_user',compact('edit'));
    }
    public function allUserEdit($id){
        $edit = User::find($id);
        return view('admin.user.all_edit_user',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nid' => 'required|min:13',
        ]);
        if($request->category == 'employee'){
            $delete_image = User::find($id);
            $update = User::find($id);
            $user_image = $request->file('image');
            if(!empty($user_image)){
                $user_image_name = time().'.'.$user_image->getClientOriginalExtension();
                $user_image->move(public_path().'/assets/images/employee_image/',$user_image_name);
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'image' => $user_image_name,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
                unlink('assets/images/employee_image/'.$delete_image->image);
            }else{
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
            }
            $mail_unique = User::where('id','!=',$id)->where('email','=',$request->email)->first();
            if(empty($mail_unique)){
                $update->update([
                    'email' => $request->email,
                ]);
            }else{
                $request->validate([
                    'email' => 'unique:users',
                ]);
            }
            if(!empty($request->password)){
                if($request->password == $request->confirm_password){
                    $update->update([
                        'password' => bcrypt($request->password),
                    ]);
                }
                elseif($request->password != $request->confirm_password){
                    $request->validate([
                        'password' => 'confirmed',
                    ]);
                }
            }
            Session::flash('success_employee','User Updated Successfully To The System');
            $employees = User::where('category','=','employee')->orderBy('id','DESC')->paginate(24);
            return view('admin.user.user_employee',compact('employees'));
        }
        if($request->category == 'vendor'){
            $delete_image = User::find($id);
            $update = User::find($id);
            $user_image = $request->file('image');
            if(!empty($user_image)){
                $user_image_name = time().'.'.$user_image->getClientOriginalExtension();
                $user_image->move(public_path().'/assets/images/employee_image/',$user_image_name);
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'image' => $user_image_name,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
                unlink('assets/images/employee_image/'.$delete_image->image);
            }else{
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
            }
            $mail_unique = User::where('id','!=',$id)->where('email','=',$request->email)->first();
            if(empty($mail_unique)){
                $update->update([
                    'email' => $request->email,
                ]);
            }else{
                $request->validate([
                    'email' => 'unique:users',
                ]);
            }
            if(!empty($request->password)){
                if($request->password == $request->confirm_password){
                    $update->update([
                        'password' => bcrypt($request->password),
                    ]);
                }
                elseif($request->password != $request->confirm_password){
                    $request->validate([
                        'password' => 'confirmed',
                    ]);
                }
            }
            Session::flash('success_vendor','User Updated Successfully To The System');
            $vendors = User::where('category','=','vendor')->orderBy('id','DESC')->paginate(24);
            return view('admin.user.user_vendor',compact('vendors'));
        }
        if($request->category == 'distributor'){
            $delete_image = User::find($id);
            $update = User::find($id);
            $user_image = $request->file('image');
            if(!empty($user_image)){
                $user_image_name = time().'.'.$user_image->getClientOriginalExtension();
                $user_image->move(public_path().'/assets/images/employee_image/',$user_image_name);
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'image' => $user_image_name,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
                unlink('assets/images/employee_image/'.$delete_image->image);
            }else{
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
            }
            $mail_unique = User::where('id','!=',$id)->where('email','=',$request->email)->first();
            if(empty($mail_unique)){
                $update->update([
                    'email' => $request->email,
                ]);
            }else{
                $request->validate([
                    'email' => 'unique:users',
                ]);
            }
            if(!empty($request->password)){
                if($request->password == $request->confirm_password){
                    $update->update([
                        'password' => bcrypt($request->password),
                    ]);
                }
                elseif($request->password != $request->confirm_password){
                    $request->validate([
                        'password' => 'confirmed',
                    ]);
                }
            }
            Session::flash('success_distributor','User Updated Successfully To The System');
            $distributors = User::where('category','=','distributor')->orderBy('id','DESC')->paginate(24);
            return view('admin.user.user_distributor',compact('distributors'));
        }
    }
    public function allUserUpdate(Request $request){
        $request->validate([
            'nid' => 'required|min:13',
        ]);
            $image_delete = User::find($request->id);
            $update = User::find($request->id);
            $user_image = $request->file('image');
            if(!empty($user_image)){
                $user_image_name = time().'.'.$user_image->getClientOriginalExtension();
                $user_image->move(public_path().'/assets/images/employee_image/',$user_image_name);
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'image' => $user_image_name,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
                unlink('assets/images/employee_image/'.$image_delete->image);
            }else{
                $update->update([
                    'name' => $request->first_name.' '.$request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'nid' => $request->nid,
                    'address' => $request->address,
                    'position' => $request->position,
                    'category' => $request->category,
                    'role' => $request->role,
                ]);
            }
            $mail_unique = User::where('id','!=',$request->id)->where('email','=',$request->email)->first();
            if(empty($mail_unique)){
                $update->update([
                    'email' => $request->email,
                ]);
            }else{
                $request->validate([
                    'email' => 'unique:users',
                ]);
            }
            if(!empty($request->password)){
                if($request->password == $request->confirm_password){
                    $update->update([
                        'password' => bcrypt($request->password),
                    ]);
                }
                elseif($request->password != $request->confirm_password){
                    $request->validate([
                        'password' => 'confirmed',
                    ]);
                }
            }
        Session::flash('success','User Updated Successfully To The System');
        $users = User::orderBy('id','DESC')->paginate(24);
        return view('admin.user.all_user',compact('users'));
    }
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        unlink('assets/images/employee_image/'.$delete->image);
        return redirect()->back();
    }
    public function employeeDestroy(Request $request){
        $delete = User::find($request->id);
        $delete->delete();
        unlink('assets/images/employee_image/'.$delete->image);
        return redirect()->back();
    }
    public function vendorDestroy(Request $request){
        $delete = User::find($request->id);
        $delete->delete();
        unlink('assets/images/employee_image/'.$delete->image);
        return redirect()->back();
    }
    public function distributorDestroy(Request $request){
        $delete = User::find($request->id);
        $delete->delete();
        unlink('assets/images/employee_image/'.$delete->image);
        return redirect()->back();
    }
    public function employee(){
        $employees = User::where('category','=','employee')->orderBy('id','DESC')->paginate(24);
        return view('admin.user.user_employee',compact('employees'));
    }
    public function vendor(){
        $vendors = User::where('category','=','vendor')->orderBy('id','DESC')->paginate(24);
        return view('admin.user.user_vendor',compact('vendors'));
    }
    public function distributor(){
        $distributors = User::where('category','=','distributor')->orderBy('id','DESC')->paginate(24);
        return view('admin.user.user_distributor',compact('distributors'));
    }
    public function search(Request $request){
          $users = User::where('name','like','%'.$request->user_search.'%')->orderBy('id','DESC')->paginate(24);
          return view('admin.user.all_user',compact('users'));
    }
    public function employeeSearch(Request $request){
        $employees = User::where('category','=','employee')->where('name','like','%'.$request->user_search.'%')->orderBy('id','DESC')->paginate(24);
        return view('admin.user.user_employee',compact('employees'));
    }
    public function vendorSearch(Request $request){
          $vendors = User::where('category','=','vendor')->where('name','like','%'.$request->user_search.'%')->orderBy('id','DESC')->paginate(24);
          return view('admin.user.user_vendor',compact('vendors'));
    }
    public function distributorSearch(Request $request){
          $distributors = User::where('category','=','distributor')->where('name','like','%'.$request->user_search.'%')->orderBy('id','DESC')->paginate(24);
          return view('admin.user.user_distributor',compact('distributors'));
    }
}
