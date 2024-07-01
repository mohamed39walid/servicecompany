<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Retrieve all Favourite items for the authenticated user
        $servicesintheFavourite = Favourite::where('user_id', Auth::id())->get();

        // Initialize an empty array to hold the services' attributes
        $servicesFavourite = [];

        // Loop through each Favourite item and get the corresponding service attributes
        foreach ($servicesintheFavourite as $Favourite_item) {
            $service = Service::select('id', 'service_name', 'service_description')
                ->where('id', $Favourite_item->service_id)
                ->first();

            if ($service) {
                $servicesFavourite[] = $service->toArray();
            }
        }

        // Print the services for debugging (optional)

        // Return the view with the services in the Favourite
        $h1 = empty($servicesFavourite) ? "Your Favourite Is Empty" : 'Your Favourite';

        // Return the view with the services in the Favourite and the heading
        return view('Favourite', compact('servicesFavourite', 'h1'));
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
        Favourite::create([
            "user_id" => Auth::id(),
            "service_id" => $id
        ]);
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Favourite_item = Favourite::where('user_id', Auth::id())->where('service_id', $id)->firstOrFail();
        $Favourite_item->delete();
        return redirect('/');
    }
    public function deletefrompage($id){
        $Favourite_item = Favourite::where('user_id', Auth::id())->where('service_id', $id)->firstOrFail();
        $Favourite_item->delete();
        return redirect('/favourites');
    }
}
