@extends('templates/master')

@section('title')
    <div>New Product</div>
@endsection


@section('content')
    @if ($reviewSaved)
        <div class='alert alert-success'>Thank you, your review was saved.</div>
    @endif

    @if ($app->errorsExist())
        <div class='alert alert-danger'>Please correct the errors below</div>
    @endif
    <div id='product-show'>
        <h2>{{ $product['name'] }}</h2>

        <img src='/images/products/{{ $product['sku'] }}.jpg' class='product-thumb'>

        <p class='product-description'>
            {{ $product['description'] }}
        </p>

        <div class='product-price'>${{ $product['price'] }}</div>
    </div>
    <form method='POST' id='product-new' action='/products/new'>
        <h3>Review {{ $product['name'] }}</h3>
        <input type='text' name='sku' value='{{ $product['sku'] }}'>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='name' id='name' value='{{ $app->old('name') }}'>
        </div>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='description' id='description'
                value='{{ $app->old('description') }}'>
        </div>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='price' id='price' value='{{ $app->old('price') }}'>
        </div>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='available' id='available' value='{{ $app->old('available') }}'>
        </div>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='weight' id='weight' value='{{ $app->old('weight') }}'>
        </div>
        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='perishable' id='perishable'
                value='{{ $app->old('perishable') }}'>
        </div>




        <button type='submit' class='btn btn-primary'>Submit Review</button>
    </form>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <a href='/products'>&larr; Return to all products</a>

    <div id='reviews'>
        @foreach ($reviews as $review)
            <div>
                <div class='review-name'>{{ $review['name'] }}</div>
                <div class='review-text'>>{{ $review['review'] }}</div>
            </div>
        @endforeach
    </div>
@endsection
