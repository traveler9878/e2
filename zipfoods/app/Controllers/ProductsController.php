<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    
    
    public function index()
    {
        //dump($productsObj);

        $products = $this->app->db()->all('products');
        
        $this->app->view('products/index', ['products' => $products]);
    }

    public function show()
    {
        $sku = $this->app->param('sku', '1');

        if(is_null($sku)){
            $this->app->redirect('/products');
        }

        
        $productQuery = $this->app->db()->findByColumn('products', 'sku', '=', $sku);

//the solution uses thee product set below instead of array index 0 which would be a problem if the array were empty
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $productQuery[0]['id']);


        //dd($productQuery);

        if(empty($productQuery)){
            return $this->app->view('products/missing');
        }else{
            $product = $productQuery[0];
        }
//solution:  $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $product['id'];

        //dd($productQuery);

        $reviewSaved = $this->app->old('reviewSaved');

        return $this->app->view('products/show', ['product' => $product, 'reviews' => $reviews, 'reviewSaved' => $reviewSaved]);
    }

    public function missing(){
        return $this->app->view('products/missing');
    }

    public function saveReview()
    {

        //validate, if fails aborts and retruns to submisstion page with errors and old data structures
        $this->app->validate([
            'sku' => 'required',
            'product_id' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);
      
    //dump('Connection successful!');

    
        
        //dump($this->app->input('sku'));
        $product_id = $this->app->input('product_id');
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $review = $this->app->input('review');

        #Todo:  Persist review to the database...
        
        $this->app->db()->insert('reviews', [
            'product_id' => $product_id,
            'name' => $name,
            'review' => $review
        ]);
        
        return $this->app->redirect('/product?sku=' . $sku, ['reviewSaved' => true]);
    }

    //replaced new with instruction code
    public function new()
    {
        $productSaved = $this->app->old('productSaved');
        $sku = $this->app->old('sku');

        return $this->app->view('products/new', [
            'productSaved' => $productSaved,
            'sku' => $sku,
        ]);
    }

    /**
     *
     */
    public function save()
    {
        $this->app->validate([
            'name' => 'required',
            'sku' => 'required|alphaNumericDash',
            'description' => 'required',
            'price' => 'required|numeric',
            'available' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);

        $this->app->db()->insert('products', $this->app->inputAll());

        $this->app->redirect('/products/new', [
            'productSaved' => true,
            'sku' => $this->app->input('sku')
        ]);
    }
    

}