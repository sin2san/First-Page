<?php namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quantity;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct(Product $product, Quantity $quantity)
    {
        $this->module = "product";
        $this->data = $product;
        $this->quantity = $quantity;
    }

    // Funtion to get all products
    public function get_products()
    {   
        $module = $this->module;

        // Getting all products with quantity, ordering with id in descending order and paginating
        $allProducts = $this->data
            ->orderBy('id', 'DESC')
            ->with(['quantity'])
            ->paginate(10);

        // Returning all products to view
        return view($module.'.products', compact('allProducts', 'module'));
    }

    // Function to get add product page
    public function get_add_product()
    {
        $module = $this->module;

        return view($module.'.add', compact('module'));
    }

    // Function to store the product to database
    public function post_add_product(ProductRequest $request)
    {
        $module = $this->module;

        // Gettuing all values
        $this->data->fill($request->all());
        
        // Save product data (name, description, price) to product table in database
        $this->data->save();
            
        // storing product id and it's stock count (quantity) in quantity table in database
        $this->quantity->product_id = $this->data->id;
        $this->quantity->stock_count = $request->stock_count;

        // Save quantity datas
        $this->quantity->save();

        // Retunr to all products page after successfull submission
        return redirect($module.'/products')->with('success', 'Product has been successfully added.');
    }
}
