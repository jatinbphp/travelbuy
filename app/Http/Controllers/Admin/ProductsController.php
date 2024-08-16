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

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['menu'] = 'Products';
        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['menu'] = 'Products';
        return view('admin.products.edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['menu'] = 'Products';
        $data['product'] = Products::findOrFail($id);
        return view('admin.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
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
