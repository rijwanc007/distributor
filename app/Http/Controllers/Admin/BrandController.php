<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(24);
        return view('admin.brand.brand_index',compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.brand_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'unique:brands',
        ]);
        Brand::create([
           'brand_name' => $request->brand_name,
           'brand_description' => $request->brand_description,
           'brand_status' => $request->brand_status,
        ]);
        Session::flash('success','brand create successfully');
        return redirect('brand');
    }
    public function search(Request $request){
        $brands = Brand::where('brand_name','like','%'.$request->search.'%')->orderBy('id','DESC')->paginate(24);
        return view('admin.brand.brand_index',compact('brands'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
       $edit = Brand::find($id);
       return view('admin.brand.brand_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $brand_name_duplicate_check = Brand::where('id','!=',$id)->where('brand_name','=',$request->brand_name)->first();
        $update = Brand::find($id);
        if (!empty($brand_name_duplicate_check)){
            $request->validate([
                'brand_name' => 'unique:brands',
            ]);
        }
        $update->update([
           'brand_name' => $request->brand_name,
           'brand_description' => $request->brand_description,
           'brand_status' => $request->brand_status,
        ]);
        Session::flash('success','brand updated successfully');
        return redirect('brand');
    }
    public function destroy($id)
    {
        $delete = Brand::find($id);
        $delete->delete();
        Session::flash('success','brand delete successfully');
        return redirect('brand');
    }
}
