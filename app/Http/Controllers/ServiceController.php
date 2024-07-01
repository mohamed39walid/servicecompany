<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Service;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function homepage(){
        $services = Service::latest()->paginate(6);
        $cart_services = Cart::select('service_id')->where('user_id', Auth::id())->pluck('service_id')->toArray();
        $fav_services = Favourite::select('service_id')->where('user_id', Auth::id())->pluck('service_id')->toArray();
        return view('welcome')->with('services', $services)->with('cart_services', $cart_services)->with('fav_services', $fav_services);
    }

    public function index(){
        $services = Service::latest()->paginate(4);
        return view('ServicesDashboard.servicesdashboard')->with('services', $services);
    }

    public function showaddform(){
        $category_id = Category::select('id', 'name')->get();
        return view('ServicesDashboard.addservice', compact('category_id'));
    }

    public function addservice(Request $request){
        $request->validate([
            'service_name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'service_description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'service_name.regex' => 'The :attribute field should not contain numeric values.',
            'service_description.regex' => 'The :attribute field should not contain numeric values.',
        ]);

        Service::create($request->all());
        return redirect('/servicesdashboard');
    }

    public function showupdateform($id){
        $categories = Category::select('id', 'name')->get();
        $service = Service::findOrFail($id);
        return view('ServicesDashboard.updateservice')->with('id', $id)->with('service', $service)->with('categories', $categories);
    }

    public function updateservice($id, Request $request){
        $request->validate([
            'service_name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'service_description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'service_name.regex' => 'The :attribute field should not contain numeric values.',
            'service_description.regex' => 'The :attribute field should not contain numeric values.',
        ]);

        $updated_data = Service::findOrFail($id);
        $updated_data->update($request->all());
        return redirect('/servicesdashboard');
    }

    public function showconfirmdelete($id){
        return view('ServicesDashboard.deleteservice')->with('id', $id);
    }

    public function deleteservice($id){
        $deletedservice = Service::findOrFail($id);
        $deletedservice->delete();
        return redirect('/servicesdashboard');
    }
}
