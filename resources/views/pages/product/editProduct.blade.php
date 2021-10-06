<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center" style="
    height: 100vh;
    width: 100%;
    ">
        <div>
            <div class="p-4" style=" 
        border:2px solid white;
        border-radius: 10px;
        width: 400px;
        color: white;
       ">
                <form action="{{route('updateProduct')}}" method="post" >
                    {{csrf_field()}}
                    <h4 class="fw-bold text-dark">Update Product</h4>
                    <input type="text" name="id" hidden value={{ $products->id }} class="form-control w-100">
                    <input type="text" name="p_name" value={{ $products->p_name }} placeholder="p_name"  class="form-control my-1 w-100">
                        <div>
                            @error('p_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <input type="text" placeholder="p_code" value={{ $products->p_code }}  name="p_code" class="form-control my-1  w-100">
                        <div>
                            @error('p_code')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <input type="text" placeholder="p_desc" value={{ $products->p_desc }} name="p_desc" class="my-1  form-control w-100">
                        <div>
                            @error('p_desc')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <input type="text" placeholder="p_category" value={{ $products->p_category }} name="p_category" class="my-1 form-control w-100">
                        <div>
                            @error('p_category')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <input type="text" placeholder="p_price" value={{ $products->p_price }} name="p_price" class="my-1 form-control w-100">
                        <div>
                            @error('p_price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                         
                        <input type="text" placeholder="p_quantity" value={{ $products->p_quantity }} name="p_quantity" class="my-1 form-control w-100">
                        <div>
                            @error('p_quantity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <input type="text" placeholder="p_purchased" value={{ $products->p_purchased }} name="p_purchased" class="my-1 form-control w-100">
                        <div>
                            @error('p_purchased')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <input type="text" placeholder="p_rating" value={{ $products->p_rating }} name="p_rating" class="my-1 form-control w-100">
                        <div>
                            @error('p_rating')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    <div class="d-flex">
                        <a href={{route('productList')}} class="btn btn-danger btn-sm px-3">Back</a>
                        <div class="ms-auto">
                            <input type="submit" value="Update" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>