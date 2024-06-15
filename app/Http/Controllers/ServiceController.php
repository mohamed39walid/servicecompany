<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function homepage(){
        $services = Service::latest()->paginate(4);
        $service_id = Cart::select('id','service_id')->where('user_id',Auth::id())->get();
        return view('welcome')->with('services',$services)->with('service_id',$service_id);
    }
    public function index(){
        $services = Service::latest()->paginate(4);
        return view('ServicesDashboard.servicesdashboard')->with('services',$services);
    }
    public function showaddform(){
        $category_id = Category::select('id','name')->get();
        return view('ServicesDashboard.addservice',compact('category_id'));
    }
    public function addservice(Request $request){
        $request->validate([
            'service_name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'service_description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'service_name.regex' => 'The :attribute field should not contain numeric values.',
            'service_description.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        // return $request;
        Service::create($request->all());
        return redirect('/servicesdashboard');
    }
    public function showupdateform($id){
        $categories = Category::select('id','name')->get();
        $service = Service::findorFail($id);
        return view('ServicesDashboard.updateservice')->with('id',$id)->with('service',$service)->with('categories',$categories);
    }
    public function updateservice($id,Request $request){
        $request->validate([
            'service_name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'service_description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
        ], [
            'service_name.regex' => 'The :attribute field should not contain numeric values.',
            'service_description.regex' => 'The :attribute field should not contain numeric values.',
        ]);
        $updated_data = Service::findorFail($id);
        $updated_data->update($request->all());
        return redirect('/servicesdashboard');
    }
    public function showconfirmdelete($id){
        return view('ServicesDashboard.deleteservice')->with('id',$id);
    }
    public function deleteservice($id){
        $deletedservice= Service::findorFail($id);
        $deletedservice->delete();
        return redirect('/servicesdashboard');
    }
}
