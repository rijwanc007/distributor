<?php

namespace App\Http\Controllers\Admin;

use App\Imports\SaleImport;
use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::where('auth_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(24);
        return view('admin.sale.sale_index',compact('sales'));
    }
    public function allSale(){
        $sales = Sale::orderBy('id','DESC')->paginate(24);
        return view('admin.sale.all_sale',compact('sales'));
    }
    public function create()
    {
        return view('admin.sale.sale_create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'upload_file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('upload_file');
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $explode = explode('.',$file_name);
        if(end($explode) == 'xls'){
            $file_extension_convert = str_replace('.xls','.xlsx',$file_name);
        }else{
            $file_extension_convert = $file_name;
        }
        $file->move(public_path().'/assets/files/',$file_extension_convert);
        Sale::create([
            'auth_id' => Auth::user()->id,
            'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'nid' => Auth::user()->nid,
            'upload_file' => $file_extension_convert,
            'message' => $request->sale_message,
        ]);
        return redirect('sale');
    }
    public function show($id)
    {
        $show = Sale::find($id);
        $path = public_path().'/assets/files/'.$show->upload_file;
        $headings = (new HeadingRowImport())->toArray($path);

//        get heading row dynamically function start here
        if (count($headings)){
            foreach ($headings as $key => $heading){
                foreach ($heading as $index => $title){
                    for ($i = 0; $i<count($title); $i++){
                        if ($title[$i] != ""){
                            $head[] = $title[$i];
                        }
                    }
                }
            }
        }
//        get heading row dynamically function end here

//        get value all row with heading
        $rows = Excel::toArray(new SaleImport,$path);
        if(count($rows)){
            foreach ($rows as $key => $value) {
                foreach ($value as $index => $result){
                    $arr[] = $result;
                }
                return view('admin.sale.sale_show',compact('head','arr'));
            }
        }
    }
    public function saleSearch(Request $request){
        $sales = Sale::where('auth_id','=',Auth::user()->id)->where('message','like','%'.$request->search.'%')
                      ->orWhere('auth_id','=',Auth::user()->id)->where('upload_file','like','%'.$request->search.'%')
                      ->orWhere('auth_id','=',Auth::user()->id)->where('created_at','like','%'.$request->search.'%')
                      ->orderBy('id','DESC')
                      ->paginate(24);
        return view('admin.sale.sale_index',compact('sales'));
    }
    public function allSaleSearch(Request $request){
        $sales = Sale::where('message','like','%'.$request->search.'%')
                      ->orWhere('name','like','%'.$request->search.'%')
                      ->orWhere('email','like','%'.$request->search.'%')
                      ->orWhere('upload_file','like','%'.$request->search.'%')
                      ->orWhere('created_at','like','%'.$request->search.'%')
                      ->orderBy('id','DESC')
                      ->paginate(24);
        return view('admin.sale.all_sale',compact('sales'));
    }
    public function edit($id)
    {
        $edit = Sale::find($id);
        return view('admin.sale.sale_edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $update = Sale::find($id);
        $file = $request->file('upload_file');
        if (!empty($file)){
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/assets/files/',$file_name);
            unlink('assets/files/'.$update->upload_file);
            $update->update([
                'auth_id' => Auth::user()->id,
                'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'nid' => Auth::user()->nid,
                'upload_file' => $file_name,
                'message' => $request->sale_message,
            ]);
        }else{
            $update->update([
                'auth_id' => Auth::user()->id,
                'name' => Auth::user()->first_name.' '.Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'nid' => Auth::user()->nid,
                'message' => $request->sale_message,
            ]);
        }
        Session::flash('success','Sale Updated Successfully');
        return redirect('sale');
    }
    public function destroy($id)
    {
      $delete = Sale::find($id);
      $delete->delete();
      unlink('assets/files/'.$delete->upload_file);
      Session::flash('success','Sale Deleted Successfully');
      return redirect('sale');
    }
}
