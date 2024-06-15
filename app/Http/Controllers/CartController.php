<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all cart items for the authenticated user
        $servicesinthecart = Cart::where('user_id', Auth::id())->get();

        // Initialize an empty array to hold the services' attributes
        $servicescart = [];

        // Loop through each cart item and get the corresponding service attributes
        foreach ($servicesinthecart as $cart_item) {
            $service = Service::select('id', 'service_name', 'service_description')
                ->where('id', $cart_item->service_id)
                ->first();

            if ($service) {
                $servicescart[] = $service->toArray();
            }
        }

        // Print the services for debugging (optional)

        // Return the view with the services in the cart
        $h1 = empty($servicescart) ? "Your Cart Is Empty" : 'Your Cart';

        // Return the view with the services in the cart and the heading
        return view('cart', compact('servicescart', 'h1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        Cart::create([
            "user_id" => Auth::id(),
            "service_id" => $id
        ]);
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart_item = Cart::where('user_id', Auth::id())->where('service_id', $id)->firstOrFail();
        $cart_item->delete();
        return redirect('/');
    }
    public function deletefrompage($id)
    {
        $cart_item = Cart::where('user_id', Auth::id())->where('service_id', $id)->firstOrFail();
        $cart_item->delete();
        return redirect('/cart');
    }
}
