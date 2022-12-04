<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Auth;
use App\Admin;
use DB;
use App\Model\Category;
use Input;
use Redirect;

class Categories extends Controller
{
	public function __construct()
	{
        $this->middleware('admin');
    }
	
	public function index()
    {
        $category = Category::select('*')->where('parent', '0')->get();   
        return view('admin.category', compact('category'));
    }

    public function create()
    { 
 		$category =  Category::all(); 
    	return view('admin.category_add', compact('category'));
    }
 
    public function store(Request $request)
    {        
        $inputs = $request->all();
        if(!empty($inputs['slug'])) {
        $slug_value = str_slug($inputs['slug'], "-");
        } else { 
           $slug_value = str_slug($inputs['title'], "-"); 
        }
        $data = Category::create([
        		   'parent'   => $inputs['parent'],
                   'name'   => $inputs['title'],
                   'slug'   => $slug_value,
                  ]);
        return redirect()->route('category');
    }

    public function show($id)
    {
        $category = Category::find($id); 
        return view('admin.category_show', compact('category'));
    }

    public function edit($id)
    {
    	$category = Category::find($id); 
        $load_category =  Category::select('*')->where('parent', '0')->get(); 
        return view('admin.category_edit', compact('category','load_category'));
    }


    public function update()
    {
    	$id = $_POST['id'];
        if(!empty($_POST['slug'])) {
        $slug_value = str_slug($_POST['slug'], "-");
        } else { 
           $slug_value = str_slug($_POST['title'], "-"); 
        }
        $item = Category::findOrFail($id);
	    $item->name   = $_POST['title'];
	    $item->slug   = $slug_value;
	    $item->save();
	    return Redirect::route('category');
    }

    public function destroy($id)
    {
        //
    }
    
    public function isCategoryExist()
    {
        $input = Input::all();
        $category_title = $input['title'];
        $category_id = $input['category_id']; 
        if(!empty($category_id)) {
            $user_exist_count = Category::where('name', $category_title)->where('id', '!=', $category_id)->count();
        } else {
            $user_exist_count = Category::where('name', $category_title)->count();
        } 
        if ($user_exist_count == 1) { 
            return "false";
        } else { 
            return "true";
        }
    }
    
}
