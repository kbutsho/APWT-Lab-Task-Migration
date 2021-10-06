<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showList()
    {
        return view('pages.product.productList');
    }
    public function listingProduct(Request $request)
    {
        $this->validate(
            $request,
            [
                'p_name' => 'required|min:4|max:20',
                'p_code' => 'required',
                'p_desc' => 'required',
                'p_category' => 'required',
                'p_price' => 'regex:/[0-9]/',
                'p_quantity' => 'regex:/[0-9]/',
                'p_rating' => 'regex:/[0-9]/',
                'p_purchased' => 'required',
            ],
            [
                'p_name.required' => 'Product name is required!',
                'p_name.min' => 'Must contain 4 characters!',
                'p_name.max' => 'Must contain less than 20 characters!',
                'p_code.required' => 'Product Code is required!',
                'p_desc.required' => 'Product Description is required!',
                'p_category.required' => 'Product category is Required!',
                'p_price.regex' => 'Invalid formate! Enter valid Number!',
                'p_quantity.regex' => 'Invalid formate! Enter valid Number!',
                'p_rating.regex' => 'Invalid formate! Enter valid Number!',
                'p_purchased.required' => 'Product Purchased is required!',
            ]
        );

        $product = new Product();
        $product->p_name = $request->p_name;
        $product->p_code = $request->p_code;
        $product->p_desc = $request->p_desc;
        $product->p_category = $request->p_category;
        $product->p_price = $request->p_price;
        $product->p_quantity = $request->p_quantity;
        $product->p_rating = $request->p_rating;
        $product->p_purchased = $request->p_purchased;

        $product->save();
        $request->session()->flash('product-added', 'Product Added!');
        return redirect('addProduct');
    }
    public function allProduct()
    {
        $allProducts = Product::all();
        return view('pages.product.addProduct', ['allProducts' => $allProducts]);
    }
    public function productList()
    {
        $allProducts = Product::all();
        return view('pages.product.productList', ['allProducts' => $allProducts]);
    }
    function deleteProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->delete();
        $request->session()->flash('product-delete', 'Product Deleted Successfully!');
        return redirect('productList');
    }
    function EditProduct($id)
    {
        $products = Product::find($id);
        return view('pages.product.editProduct', ['products' => $products]);
    }

    function updateProduct(Request $request)
    {
        $this->validate(
            $request,
            [

                'p_name' => 'required|min:4|max:20',
                'p_code' => 'required',
                'p_desc' => 'required',
                'p_category' => 'required',
                'p_price' => 'regex:/[0-9]/',
                'p_quantity' => 'regex:/[0-9]/',
                'p_rating' => 'regex:/[0-9]/',
                'p_purchased' => 'required',
            ],
            [
                'p_name.required' => 'Product name is required!',
                'p_name.min' => 'Must contain 4 characters!',
                'p_name.max' => 'Must contain less than 20 characters!',
                'p_code.required' => 'Product Code is required!',
                'p_desc.required' => 'Product Description is required!',
                'p_category.required' => 'Product category is Required!',
                'p_price.regex' => 'Invalid formate! Enter valid Number!',
                'p_quantity.regex' => 'Invalid formate! Enter valid Number!',
                'p_rating.regex' => 'Invalid formate! Enter valid Number!',
                'p_purchased.required' => 'Product Purchased is required!',
            ]
        );
        $product = Product::find($request->id);

        $product->p_name = $request->p_name;
        $product->p_code = $request->p_code;
        $product->p_desc = $request->p_desc;
        $product->p_category = $request->p_category;
        $product->p_price = $request->p_price;
        $product->p_quantity = $request->p_quantity;
        $product->p_rating = $request->p_rating;
        $product->p_purchased = $request->p_purchased;
        $product->update();

        $request->session()->flash('product-update', 'Product Updated Successfully!');
        return redirect('productList');
    }
}
