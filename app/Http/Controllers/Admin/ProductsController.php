<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $data['menu'] = 'Products';

        if($request->ajax()){
            return Datatables::of(Products::orderBy('status', 'ASC'))
            ->addIndexColumn()    
            ->editColumn('created_at', function($row) {
                // return formatCreatedAt($row->created_at);
                return $row->created_at->format('Y-m-d h:i:s');
            })      
            ->editColumn('status', function($row){
                $row['table_name'] = 'products';
                return view('admin.common.status-buttons', $row);
            })
            ->editColumn('price', function($row) {
                return env('CURRENCY').number_format($row->price,2);
            }) 
            ->addColumn('action', function($row){
                $row['section_name'] = 'products';
                $row['section_title'] = 'Products';
                return view('admin.common.action-buttons', $row);
            })
            ->make(true);
        }

        return view('admin.products.index',$data);

    }

    public function create(){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $data['menu'] = 'Products';
        return view('admin.products.create',$data);
    }

    public function store(ProductRequest $request){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $input = $request->all();
        if ($file = $request->file('image')) {
            $imageName = Str::random(20) . '.' . $file->getClientOriginalExtension();    
            $file->move(public_path('uploads/products'), $imageName);
    
            $input['image'] = 'uploads/products/' . $imageName;
        }

        if ($request->status == 'active') {
            Products::where('status', 'active')->update(['status' => 'inactive']);
        }

        Products::create($input);

        \Session::flash('success', 'Product has been inserted successfully!');
        return redirect()->route('products.index');
    }

    public function show(string $id){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $data['menu'] = 'Products';
        return view('admin.products.edit',$data);
    }

    public function edit(string $id){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $data['menu'] = 'Products';
        $data['product'] = Products::findOrFail($id);
        return view('admin.products.edit',$data);
    }

    public function update(ProductRequest $request, string $id){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }

        $input = $request->all();
        $product = Products::findOrFail($id);

        if ($file = $request->file('image')) {
            $imageName = Str::random(20) . "." . $file->getClientOriginalExtension();
            
            $file->move(public_path('uploads/products'), $imageName);

            $input['image'] = 'uploads/products/' . $imageName;

            if (!empty($product->image) && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
        } else {
            $input['image'] = $product->image;
        }

        if ($request->has('status') && $request->status == 'active') {
            Products::where('id', '!=', $id)->update(['status' => 'inactive']);
        }
        
        $product->update($input);

        \Session::flash('success','Product has been updated successfully!');
        return redirect()->route('products.index');
    }

    public function destroy(string $id){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['user', 'procurement'])) {
            return redirect()->route('errors.404');
        }
        
        $product = Products::findOrFail($id);
        $isInCart = Carts::where('product_id', $id)->first();
        
        if ($isInCart) {
            return response()->json(['status' => 'error', 'message' => 'The product is currently in the cart. Please remove the product from the cart before deleting it.']);
        }
        else{
            $product->delete();
            return response()->json(['status' => 'success', 'message' => 'Product deleted successfully.']);
        }
    }
}
