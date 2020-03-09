<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Offer;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    public function index()
    {
       $offers = Offer::orderBy('id','DESC')->paginate(24);
       return view('admin.offer.offer_index',compact('offers'));
    }
    public function create()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.offer.offer_create',compact('brands'));
    }
    public function store(Request $request)
    {
        if($request->brand_name == 'select_brand' || $request->product_code == 'product_code' || $request->product_name == 'product_name'){
            Session::flash('success','Please Select Brand Name , Product Name, Product Name Properly');
            return redirect()->back();
        }else{
            $offer_check = Offer::where('product_code','=',$request->product_code)->where('product_name','=',$request->product_name)->first();
            if(empty($offer_check)){
                Offer::create([
                    'brand_name' => $request->brand_name,
                    'product_code' => $request->product_code,
                    'product_name' => $request->product_name,
                    'offer_type' => $request->offer_type,
                    'start' => $request->start,
                    'end' => $request->end,
                    'pieces' => $request->pieces,
                    'offer' => $request->offer,
                ]);
            }else{
                $offer_check->update([
                    'offer_type' => $request->offer_type,
                    'start' => $request->start,
                    'end' => $request->end,
                    'pieces' => $request->pieces,
                    'offer' => $request->offer,
                ]);
            }
            Session::flash('success','Offer Created Successfully');
            return redirect('offer');
        }
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $edit = Offer::find($id);
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.offer.offer_edit',compact('edit','brands'));
    }
    public function update(Request $request, $id)
    {
       $update = Offer::find($id);
       $update->update([
           'offer_type' => $request->offer_type,
           'start' => $request->start,
           'end' => $request->end,
           'pieces' => $request->pieces,
           'offer' => $request->offer,
       ]);
        Session::flash('success','Offer Updated Successfully');
        return redirect('offer');
    }
    public function destroy($id)
    {
        $delete = Offer::find($id);
        $delete->delete();
        Session::flash('success','Offer Deleted Successfully');
        return redirect('offer');
    }
    public function offerBrandName($brand){
        $product_code = ProductCategory::where('product_brand','=',$brand)->orderBy('id','DESC')->get();
        return response()->json($product_code);
    }
    public function offerProductCode($code,$brand){
        $product_name = ProductCategory::where('product_brand','=',$brand)->where('product_code','=',$code)->get();
        return response()->json($product_name);
    }
    public function offerSearch(Request $request){
        $offers = Offer::where('brand_name','like','%'.$request->search.'%')
                        ->orWhere('product_name','like','%'.$request->search.'%')
                        ->orWhere('product_code','like','%'.$request->search.'%')
                        ->orWhere('start','like','%'.$request->search.'%')
                        ->orWhere('end','like','%'.$request->search.'%')
                        ->orderBy('id','DESC')->paginate(24);
        return view('admin.offer.offer_index',compact('offers'));
    }
}
