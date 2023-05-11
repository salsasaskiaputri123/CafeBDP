@extends('layouts')
   
@section('content')
    
<style>
    .row {
        display: flex;
        gap: 1rem;
        justify-content: space-between;
    }
</style>

<div class="row">

    @foreach($products as $product)
    
        
            <div class="col-lg-2.5 mb-3">
                <div class="card" style="width: 15rem;">
                <img src="{{ $product->image }}" class="card-img-top" alt="..." style="max-height: 300px; min-height:300px; width:100%; object-fit:cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p>{{ $product->description }}</p>
                        <p class="card-text"><strong>Price: </strong> {{ $product->price }}$</p>
                        <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        
    
    @endforeach
</div>
    
@endsection