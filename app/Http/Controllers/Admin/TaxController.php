<?php

namespace App\Http\Controllers\Admin;

use App\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::orderBy('id','DESC')->paginate(24);
        return view('admin.tax.tax_index',compact('taxes'));
    }
    public function create()
    {
        return view('admin.tax.tax_create');
    }
    public function store(Request $request)
    {
       $request->validate([
          'tax_title' => 'unique:taxes',
       ]);
       Tax::create([
          'tax_title' => $request->tax_title,
          'tax_value' => $request->tax_value,
          'tax_status' => $request->tax_status,
       ]);
       Session::flash('success','Tax Added Successfully');
       return redirect('tax');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $edit = Tax::find($id);
        return view('admin.tax.tax_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $duplicate_tax_check = Tax::where('id','!=',$id)->where('tax_title','=',$request->tax_title)->first();
        $update = Tax::find($id);
        if (!empty($duplicate_tax_check)){
            $request->validate([
                'tax_title' => 'unique:taxes',
            ]);
        }
        $update->update([
           'tax_title' => $request->tax_title,
           'tax_value' => $request->tax_value,
           'tax_status' => $request->tax_status,
        ]);
        Session::flash('success','Tax Updated Successfully');
        return redirect('tax');
    }
    public function destroy($id)
    {
       $delete = Tax::find($id);
       $delete->delete();
       Session::flash('success','Tax Deleted Successfully');
       return redirect('tax');
    }
}
