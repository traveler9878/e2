@extends('templates/master')

@section('title')
    Product Not Found
@endsection


@section('content')
    <div id='product-show'>
        <h2>Product Not Found</h2>


        <p class='product-description'>
            Sorry, we were not able to find the product you were looking for.
        </p>

    </div>

    <a href='/products'>&larr; Check out our other products...</a>
@endsection
