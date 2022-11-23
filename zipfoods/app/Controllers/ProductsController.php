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
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $productQuery[0]['id']);
        //dd($productQuery);

        if(empty($productQuery)){
            return $this->app->view('products/missing');
        }else{
            $product = $productQuery[0];
        }

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

    public function new(){
        /*
        $this->app->validate([
            'sku' => 'required',
            'description' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'available' => 'required',
            'weight' => 'required|numeric',
            'perishable' => 'required|digit'
        ]);
        */
        if(is_null($this->app->input('name'))){
            return $this->app->view('products/new');
        }
        $name = $this->app->input('name');
        $sku = $this->app->input('sku');
        $description = $this->app->input('description');
        $price = $this->app->input('price');
        $available = $this->app->input('available');
        $weight = $this->app->input('weight');
        $perishable = $this->app->input('perishable');

        $this->app->db()->insert('products', [
            'sku' => $sku,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'available' => $available,
            'weight' => $weight,
            'perishable' => $perishable
        ]);
        
        return $this->app->redirect('/product?sku=' . $sku, ['newSaved' => true]);
        
    }
    

}