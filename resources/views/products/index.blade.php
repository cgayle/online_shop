@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel Exam (online shop)</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Order</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->sub_category }}</td>
                <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($product->image)) }}" height="100" width="100"></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection