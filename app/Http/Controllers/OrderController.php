<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $products = Product::all();

//    return $request->all();
//    exit();

//        if($request->psave == 1) {
//            print_r(Product::where('id', )->first());
//            exit();
//        }
    return view('orders.create', ['products' => $products]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Order::create($request->all());

    return redirect()->route('orders.create')
      ->with('success', 'Order created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Order $orders
   * @return \Illuminate\Http\Response
   */
  public function show(Order $orders)
  {
    return view('orders.show', compact('orders'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  function showInfo(Request $request)
  {
    $orderDesc = DB::table('products')->where('id', $request->prodId)->get();
    $products = Product::all();

    return view('orders.create', ['products' => $products, 'psave' => $request->psave, 'orderDesc' => $orderDesc]);
  }

}
