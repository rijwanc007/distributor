<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WarehouseController extends Controller
{
    public function index()
    {
        $brands = Brand::where('brand_status','=','active')->orderBy('id','DESC')->get();
        $warehouses = Warehouse::orderBy('id','DESC')->paginate(24);
        return view('admin.warehouse.stock_status',compact('warehouses','brands'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $edit = Warehouse::find($id);
        return view('admin.warehouse.stock_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = Warehouse::find($id);
        $update->update([
            'brand_name' => $request->brand_name,
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_availability' => $request->product_availability,
        ]);
        Session::flash('success','Your Warehouse Stock Product Updated Successfully');
        return redirect('warehouse');
//       dd($request->all());
    }
    public function destroy($id)
    {
        $delete = Warehouse::find($id);
        $delete->delete();
        Session::flash('success','Your Warehouse Stock Product Deleted Successfully');
        return redirect('warehouse');
    }
    public function warehouseBrandSelect(Request $request){
        $brands = Brand::where('brand_status','=','active')->orderBy('id','DESC')->get();
        $warehouses = Warehouse::where('brand_name','=',$request->brand_name)->orderBy('id','DESC')->paginate(24);
        return view('admin.warehouse.stock_status',compact('warehouses','brands'));
    }
    public function warehouseSearch(Request $request){
        $brands = Brand::where('brand_status','=','active')->orderBy('id','DESC')->get();
        $warehouses = Warehouse::where('product_name','like','%'.$request->search.'%')
            ->orWhere('product_code','like','%'.$request->search.'%')
            ->orderBy('id','DESC')->paginate(24);
        return view('admin.warehouse.stock_status',compact('warehouses','brands'));
    }
}
