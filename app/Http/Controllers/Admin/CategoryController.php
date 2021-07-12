<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Section;
use Image;
use Session;

class CategoryController extends Controller
{
    public function categories()
    {
    	Session::put('page', 'categories');

    	$categories = Category::with('section','parentcategory')->get();
    	//dd($categories->toArray());
    	return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		
            if ($data['status'] == "Active") {
            	$status = 0;
            }
            else{
            	$status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
    	}
    }

    public function addEditCategory(Request $request, $id=null )
    {
    	if ($id == "") {
    		$title = "Add Category";
    		$category = new Category;
    		$categoryData = array();
    		$getCategories = array();
    		$message = "Category added successfully";
    	}
    	else{
    		$title = "Edit Category";
    		$categoryData = Category::where('id',$id)->first();
    		$categoryData = json_decode(json_encode($categoryData),true);
    		$getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$categoryData['section_id']])->get();
    		$getCategories = json_decode(json_encode($getCategories),true);
            $category = Category::find($id);
    		$message = "Category updated successfully";
    	}

        if ($request->isMethod('post')) {
        	$data = $request->all();

        	$rules=[
              'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
              'section_id'=> 'required',
              'url' => 'required',
              'category_image' => 'image',
    		];
    		$custom_msg = [
              'category_name.required' => 'Category Name is required',
              'category_name.regex' => 'Valid Category name is required',
              'section_id.required'=> 'Section is required',
              'url.numeric' => 'Category url is required',
              'category_image.image' => 'Valid image is required',
    		];
    		$this->validate($request,$rules,$custom_msg);

        	 if ($request->hasFile('category_image')) {
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/category_images/'.$imageName;
           
                   Image::make($image_tmp)->save($imagePath);
                   $category->category_image = $imageName;
                }
           
            }
        	//echo "<pre>";print_r($data);die;
        	$category->parent_id = $data['parent_id'];
        	$category->section_id = $data['section_id'];
        	$category->category_name = $data['category_name'];
        	$category->category_discount = $data['category_discount'];
        	$category->description = $data['description'];
        	$category->url = $data['url'];
        	$category->meta_title = $data['meta_title'];
        	$category->meta_description = $data['meta_description'];
        	$category->meta_keywords = $data['meta_keywords'];
        	$category->status = 1;
        	$category->save();

        	Session::flash('success_message', $message);
        	return redirect('admin/categories');
        }

        //Get All Sections
        $getSections = Section::get();

    	return view('admin.categories.add_edit_category')->with(compact('title','getSections','categoryData','getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$getCategories = Category::with('subcategories')->where(['section_id'=> $data['section_id'],'parent_id' => 0, 'status'=>1])->get();
    		$getCategories = json_decode(json_encode($getCategories),true);
    		//echo "<pre>";print_r($getCategories);die;
    		return view('admin.categories.append_category_level')->with(compact('getCategories'));
    	}
    }

    public function deleteCategoryImage($id)
    {
    	$categoryImage = Category::select('category_image')->where('id',$id)->first();
    	$imagePath = 'images/category_images/';

    	if (file_exists($imagePath.$categoryImage->category_image)) {
    		unlink($imagePath.$categoryImage->category_image);
    	}
    	Category::where('id',$id)->update(['category_image'=>'']);

    	return redirect()->back()->with('success_message','Category Image has been Deleted Successfully');
    }

    public function deleteCategory($id)
    {
    	$category = Category::where('id',$id)->first();
    	$imagePath = 'images/category_images/';
    	if (file_exists($imagePath.$category->category_image)) {
    		unlink($imagePath.$category->category_image);
    	}
    	$category->delete();
    	return redirect()->back()->with('success_message','Category has been Deleted Successfully');
    }
}
