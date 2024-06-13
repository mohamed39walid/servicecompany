<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('CategoryDashboard.categorydashboard')->with('categories',$categories);
    }
    public function showaddform(){
        return view('CategoryDashboard.addcategory');
    }
    public function createcategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'services' => 'required|string|min:1|max:255',
        ], [
            'name.regex' => 'The :attribute field should not contain numeric values.',
            'description.regex' => 'The :attribute field should not contain numeric values.',
        ]);
    
        // Use the create method instead of insert, and specify the fields to be inserted
        Category::create($request->all());
    
        return redirect('/categorydashboard');
    } 
    public function showupdateform($id){
        $category = Category::find($id);
        return view('CategoryDashboard.updateform')->with('id',$id)->with('category',$category);
    }
    public function udpatecategory($id,Request $request){
        $request->validate([
            'name' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'description' => 'required|string|min:1|max:255|regex:/^[^0-9]+$/',
            'services' => 'required|string|min:1|max:255',
        ], [
            'name.regex' => 'The :attribute field should not contain numeric values.',
            'description.regex' => 'The :attribute field should not contain numeric values.',
        ]);
    
        $updateddata = Category::findorFail($id);
        $updateddata->update($request->all());
        return redirect('/categorydashboard');
    }
    public function confirmdelete($id){
        return view('CategoryDashboard.deletecategory')->with('id',$id);
    }
    public function deletecategory($id){
        $deleteditem = Category::findorFail($id);
        $deleteditem->delete();
        return redirect('/categorydashboard');
    }
}

