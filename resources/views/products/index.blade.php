<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
</head>
<body>
    <div class="Container">
        <div class="Title">
            <h1>Products</h1>
            <p>Create, Read, Update & Delete</p>
        </div>

        <form method="post" action="{{route('products.store')}}">
            @csrf
            @method('post')
    
            <input type="text" name="name" placeholder="Name" required/>
            <input type="number" name="price" placeholder="Price" required/>
            <input type="number" name="qty" placeholder="Qty" required/>
            
            <select id="category" name="category" required>
                <option value="Category 1">Category 1</option>
                <option value="Category 2">Category 2</option>
            </select>
    
            <input class="add" type="submit" value="Add Product"/>
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Category</th>
                <th>Options</th>
            </tr>

            @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>P {{$product->price}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->category}}</td>
                <td class="options">

                    <a href="{{route('products.edit', ['product' => $product])}}" class="edit"><b>Edit</b></a>
                    <form method="post" action="{{route('products.delete',['product'=>$product])}}">
                        @csrf
                        @method('delete')

                        <button type="submit" class="delete"><b>Delete</b></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>


    </div>
    
</body>
</html>