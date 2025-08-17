<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand','category')->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new product();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('product', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|max:50',
            'quantity' => 'required|max:50',
            'brand_id' => 'required|max:50',
            'category_id' => 'required|max:50',
            'status' => 'required',
            'image.*' => 'sometimes|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $user_image = $request->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('products/images/product', $fileName);
            $data['image'] = $fileName;
        } else {
            $image = '';
        }

        $insert =  Product::create($data);
        if ($insert) {
            return redirect(route('admin.all.product'))->with('success', 'Product has been added successfully');
        } else {
            return redirect(route('admin.product.create'))->with('error', 'An error has been occured');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $product)
    {
        // @dd($product)
        $product = Product::find($product);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
        // return view('admin.product.edit', ['brand' => $brand , 'product'=>$product, 'categories'=>$categories]);
    }

    public function getProductsBySubcategory($subcategory_id)
{

    $products = Product::where('brand_id', $subcategory_id)->get();

    return response()->json($products);


}

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|max:50',
            'quantity' => 'required|max:50',
            'brand_id' => 'required|max:50',
            'category_id' => 'required|max:50',
            'status' => 'required',
            'image.*' => 'sometimes|file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $user_image = $request->file('image');
            $extension = $user_image->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $user_image->move('products/images/product', $fileName);
            $data['image'] = $fileName;
        } else {
            $image = '';
        }

    $update = $product->update($data);
    if($update){
        return redirect(route('admin.all.product', ['product' => $product]))->with('success', 'Product has been updated');
    }else{
        return redirect(route('admin.product.edit', ['product' => $product]))->with('error', 'An error has been occured');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Product::destroy($id);
        toastr()->success('Product Deleted Successfully');
        return redirect()->route('admin.all.product');
    }
}
