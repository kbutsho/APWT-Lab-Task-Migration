<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        th {
            padding: 0 50px;
        }
    </style>
</head>

@extends('../../layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 88vh;">
    <div>
        @if(session('product-update'))
        <div class="alert alert-warning w-100 text-center" role="alert">
            <span class="fw-bold"> {{ session('product-update') }}</span>
        </div>
        @endif
        {{-- delete message --}}
        @if(session('product-delete'))
        <div class="alert alert-danger font-weight-bold w-100 text-center" role="alert">
            <span class="fw-bold">
                {{ session('product-delete') }}
            </span>
        </div>
        @endif
        <table class="table table-borded table-striped table-hover">
            <tr class="text-center">
                <th class="px-4">id</th>
                <th class="px-4">P_name</th>
                <th class="px-4">p_code</th>
                <th class="px-4">p_desc</th>
                <th class="px-4">p_category</th>
                <th class="px-4">p_price</th>
                <th class="px-4">p_quantity</th>
                <th class="px-4">p_stock_date</th>
                <th class="px-4">p_rating</th>
                <th class="px-4">p_purchased</th>
                <th class="px-4">Action</th>
            </tr>
            @foreach($allProducts as $product)
                    <tr class="text-center">
                        <td class="px-4">{{$product->id}}</td>
                        <td class="px-4">{{$product->p_name}}</td>
                        <td class="px-4">{{$product->p_category}}</td>
                        <td class="px-4">{{$product->p_code}}</td>
                        <td class="px-4">{{$product->p_desc}}</td>
                        <td class="px-4">{{$product->p_category}}</td>
                        <td class="px-4">{{$product->p_price}}</td>
                        <td class="px-4">{{$product->created_at}}</td>
                        <td class="px-4">{{$product->p_rating}}</td>
                        <td class="px-4">{{$product->p_purchased}}</td>
                       
                        <td>
                            <a class="btn  btn-warning btn-sm mt-3" href={{ "editProduct/".$product->id }}>Edit</a>
                            <a class="btn btn-danger btn-sm mt-3" href={{ "deleteProduct/".$product->id }}>Delete</a>
                        </td> 
                    </tr>
            @endforeach
        </table>
        <a class="btn btn-primary btn-sm mb-3" href="{{route('addProduct')}}">Add Product</a>
    </div>
</div>
@endsection

</html>