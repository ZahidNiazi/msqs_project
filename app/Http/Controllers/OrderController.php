<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Mcq;
use App\Models\Report;
use App\Models\User;


use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        // $totalcategories = Category::Count();
        $totalcategory = Category::Count();
        $totalmcqs = Mcq::Count();
        $totalReports = Report::get();
        $totalBrand = Brand::Count();
        $totalProducts = Product::Count();
        $totalOrders = Order::Count();
        $totalUsers = User::Count();
        return view('dashboard', compact('totalBrand' , 'totalProducts','totalOrders','totalcategory','totalmcqs','totalReports','totalUsers'));
    }



     public function index()
    {
        $orders = Order::paginate(5);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new order();
        $products = Product::where('status','Active')->get();
        $categories= Category::all();
        return view('admin.order.create', compact('order', 'products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'product_id' => 'required',
            'category_id' => 'required',
            'phone' => 'required',
            'total_product' => 'required',
            'status' => 'required',
        ]);

        $insert = Order::create($data);
        if($insert){
            return redirect(route('admin.all.order'))->with('success', 'Order has been added successfully');
        }else{
            return redirect(route('admin.order.create'))->with('error', 'An error has been occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {


        $products = Product::where('status','Active')->where('category_id',$id)->get();
        return response()->json(['products'=>$products]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = Product::where('status','Active')->get();
        $categories= Category::all();
        $products= Product::all();
        return view('admin.order.edit', compact('order', 'products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'name' => 'required|max:50',
            'phone' => 'required',
            'category_id' => 'required',
            'total_product' => 'required',
            'status' => 'required',
        ]);

    $update = $order->update($data);
    if($update){
        return redirect(route('admin.all.order', ['order' => $order]))->with('success', 'Order has been updated');
    }else{
        return redirect(route('admin.order.edit', ['order' => $order]))->with('error', 'An error has been occured');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        try {
            $delete = $order->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            if($e->getCode() == "23000"){ //23000 is sql code for integrity constraint violation
                return redirect(route('admin.all.order'))->with('error', 'Foreign key constraint violation');
            }
        }
        if($delete == true){
            return redirect(route('admin.all.order'))->with('success', 'Order has been deleted');
        }else{
            return redirect(route('admin.all.order'))->with('error', 'An error has been occured');
        }
    }
}
