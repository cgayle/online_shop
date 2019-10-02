@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store')}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> Category
                    <select name="category">
                        <option value="clothing">Clothing, Accessories and Shoes</option>
                        <option value="beauty">Beauty and fragrances</option>
                        <option value="books">Books and magazines</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> Sub Category
                    <select name="sub_category">
                        <option value="shoes">Shoes</option>
                        <option value="women_clothing">Women's clothing</option>
                        <option value="men_clothing">Men's clothing</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> Product
                    <select name="product" id="selectedProduct">
                        <option value=""> -- Select One --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        
            <div>
                <a class="btn btn-info" href="{{ route('show-prod-info', ['psave'=> 1, 'prodId' => 1]) }}">Show</a>
            </div>

            <br>

            @isset($orderDesc)
                @foreach ($orderDesc as $orders)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                {{ $orders->price }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Quanity:</strong>
                                {{ $orders->quantity }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {{ $orders->description }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($product->image)) }}"
                                     height="100" width="100">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


    </form>
@endsection