<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        $products = ProductCategory::orderBy('id','DESC')->paginate(24);
        return view('admin.product_category.product_categories',compact('products','brands'));
    }
    public function create()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.product_category.product_create',compact('brands'));
    }
    public function store(Request $request)
    {
        $request->validate([
           'product_code' => 'unique:product_categories',
        ]);
        ProductCategory::create([
           'product_brand' => $request->product_brand,
           'product_code' => $request->product_code,
           'product_name' => $request->product_name,
           'unit_type' => $request->unit_type,
           'unit_measurement' => $request->unit_measurement,
           'unit' => '1 Unit',
           'purchase_price' => $request->purchase_price,
           'selling_price' => $request->selling_price,
           'product_status' => $request->product_status,
        ]);
        Session::flash('success','Product Category Added Successfully');
        return redirect('product_category');
    }
    public function show($id)
    {
        //

    }
    public function select(Request $request){
        $brands = Brand::orderBy('id','DESC')->get();
        if($request->product_brand == 'all'){
            $products = ProductCategory::orderBy('id','DESC')->paginate(24);
        }else{
            $products = ProductCategory::where('product_brand','=',$request->product_brand)->orderBy('id','DESC')->paginate(24);
        }
        return view('admin.product_category.product_categories',compact('products','brands'));
    }
    public function search(Request $request){
        $brands = Brand::orderBy('id','DESC')->get();
        $products = ProductCategory::where('product_brand','like','%'.$request->search.'%')
                                    ->orWhere('product_code','like','%'.$request->search.'%')
                                    ->paginate(24);
        return view('admin.product_category.product_categories',compact('products','brands'));
    }
    public function edit($id)
    {
        $brands = Brand::orderBy('id','DESC')->get();
        $edit = ProductCategory::find($id);
        return view('admin.product_category.product_edit',compact('edit','brands'));
    }
    public function update(Request $request, $id)
    {
        $product_name_duplicate_check = ProductCategory::where('id','!=',$id)->where('product_code','=',$request->product_code)->first();
        $update = ProductCategory::find($id);
        if(!empty($product_name_duplicate_check)){
            $request->validate([
                'product_code' => 'unique:product_categories',
            ]);
        }
        $update->update([
            'product_brand' => $request->product_brand,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'unit_type' => $request->unit_type,
            'unit_measurement' => $request->unit_measurement,
            'unit' => '1 Unit',
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'product_status' => $request->product_status,
        ]);
        Session::flash('success','Product Category Updated Successfully');
        return redirect('product_category');
    }
    public function destroy($id)
    {
        $delete = ProductCategory::find($id);
        $delete->delete();
        Session::flash('success','Product Category Delete Successfully');
        return redirect('product_category');
    }
}
