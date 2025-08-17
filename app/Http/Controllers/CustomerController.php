<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%");
        })->get();
        $data = compact('customers' , 'search');


        return view('admin.customer.index')->with($data);
    }

    public function getSubcategoriesByCategory($category_id)
    {
        $brands = Brand::where('category_id', $category_id)->get();
        return response()->json($brands);
    }


    public function create()
    {
        $customer = new Customer();
        $products = Product::where('status','Active')->get();
        $categories= Category::all();
        $brands= brand::all();
        return view('admin.customer.create', compact('brands','customer', 'products','categories'));
    }





    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'product_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'phone' => 'required',
            'total_product' => 'required',
            'status' => 'required',
        ]);

        $insert = Customer::create($data);
        if($insert){
            return redirect(route('admin.all.customer'))->with('success', 'Order has been added successfully');
        }else{
            return redirect(route('admin.customer.create'))->with('error', 'An error has been occured');
        }
    }

    public function edit( $id)
    {
        $customer = Customer::find($id);

        $products = Product::where('status','Active')->get();
        $categories= Category::all();
        $brands= Brand::all();
        return view('admin.customer.edit', compact('brands', 'products','categories','customer'));
    }

    public function update(Request $request,  Customer $id)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'product_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'phone' => 'required',
            'total_product' => 'required',
            'status' => 'required',
        ]);


    $update = $id->update($data);

    if($update){
        return redirect(route('admin.all.customer', ['customer' => $id]))->with('success', 'customer has been updated');
    }else{
        return redirect(route('admin.customer.edit', ['customer' => $id]))->with('error', 'An error has been occured');
    }
    }

    public function destroy(Customer $customer)
    {
        try {
            $delete = $customer->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
                return redirect(route('admin.all.customer'))->with('error', 'Foreign key constraint violation');
            }
        }
        if($delete == true){
            return redirect(route('admin.all.customer'))->with('success', 'customer has been deleted');
        }else{
            return redirect(route('admin.all.customer'))->with('error', 'An error has been occured');
        }
    }
}
