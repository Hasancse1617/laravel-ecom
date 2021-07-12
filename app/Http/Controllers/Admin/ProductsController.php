<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductsAttribute;
use App\productsImage;
use App\ProductColor;
use App\Product;
use App\Section;
use App\Category;
use App\Brand;
use Image;
use Session;

class ProductsController extends Controller
{
    public function products()
    {
    	Session::put('page', 'products');
    	$products = Product::with(['category','section'])->get();
    	return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		
            if ($data['status'] == "Active") {
            	$status = 0;
            }
            else{
            	$status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
    	}
    }

    public function deleteProduct($id)
    {
      $product = Product::where('id',$id)->first();
      $small_imagePath = 'images/product_images/small/';
      $medium_imagePath = 'images/product_images/medium/';
      $large_imagePath = 'images/product_images/large/';

      if (file_exists($small_imagePath.$product->main_image)) {
        @unlink($small_imagePath.$product->main_image);
      }
      if (file_exists($medium_imagePath.$product->main_image)) {
        @unlink($medium_imagePath.$product->main_image);
      }
      if (file_exists($large_imagePath.$product->main_image)) {
        @unlink($large_imagePath.$product->main_image);
      }

      $videoPath = 'videos/product_videos/';

      if (file_exists($videoPath.$product->product_video)) {
        @unlink($videoPath.$product->product_video);
      }

      $product->delete();

    	return redirect()->back()->with('success_message','Product has been Deleted Successfully');
    }

    public function addEditProduct(Request $request, $id=null)
    {
         if ($id=="") {
         	$title = "Add Product";
         	$product = new Product;
         	$productData = array();
         	$message = "Product added successfully";
         }
         else{
         	$title = "Edit Product";
         	$productData = Product::find($id);
         	$productData = json_decode(json_encode($productData),true);
         	//echo '<pre>';print_r($productData);die;
            $product = Product::find($id);
         	$message = "Product updated successfully";
         }
         
         if ($request->isMethod('post')) {
         	$data = $request->all();
         	//echo "<pre>";print_r($data);die;
         	//Product Validation
         	$rules=[
         	  'category_id'=> 'required',
              'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
              'product_code' => 'required|regex:/^[\w-]*$/',
              'product_price'=> 'required|numeric',
              'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
              
    		];
    		$custom_msg = [
              'category_id.required' => 'Category is required',
              'product_name.required' => 'Product Name is required',
              'product_name.regex' => 'Valid Product name is required',
              'product_code.required' => 'Product Code is required',
              'product_code.regex' => 'Valid Product Code is required',
              'product_price.required'=> 'Product Price is required',
              'product_price.numeric'=> 'Valid Product Price is required',
              'product_color.required' => 'Product Color is required',
              'product_color.regex' => 'Valid Product Color is required',
    		];
    		$this->validate($request,$rules,$custom_msg);
      
    		//Seve Product Details
            if (empty($data['is_featured'])) {
            	$is_featured = 'No';
            }
            else{
            	$is_featured = 'Yes';
            }
            if (empty($data['fabric'])) {
            	$data['fabric'] = "";
            }
            if (empty($data['pattern'])) {
            	$data['pattern'] = "";
            }
            if (empty($data['sleeve'])) {
            	$data['sleeve'] = "";
            }
            if (empty($data['fit'])) {
            	$data['fit'] = "";
            }
            if (empty($data['occassion'])) {
            	$data['occassion'] = "";
            }
            if (empty($data['meta_title'])) {
            	$data['meta_title'] = "";
            }
            if (empty($data['meta_description'])) {
            	$data['meta_description'] = "";
            }
            if (empty($data['meta_keywords'])) {
            	$data['meta_keywords'] = "";
            }
            if (empty($data['product_discount'])) {
            	$data['product_discount'] = 0;
            }
            if (empty($data['product_weight'])) {
            	$data['product_weight'] = 0;
            }
            if (empty($data['description'])) {
            	$data['description'] = "";
            }
            if (empty($data['wash_care'])) {
            	$data['wash_care'] = "";
            }

            //Upload Product Image
            if ($request->hasFile('main_image')) {
            	$image_tmp = $request->file('main_image');
            	//echo '<pre>';print_r($image_tmp);die;
            	if ($image_tmp->isValid()) {
            		$image_name = $image_tmp->getClientOriginalName();
            		$extension = $image_tmp->getClientOriginalExtension();
            		$imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
            		$large_image_path = "images/product_images/large/".$imageName;
            		$medium_image_path = "images/product_images/medium/".$imageName;
            		$small_image_path = "images/product_images/small/".$imageName;

            		Image::make($image_tmp)->save($large_image_path);
            		Image::make($image_tmp)->resize(500,500)->save($medium_image_path);
            		Image::make($image_tmp)->resize(250,250)->save($small_image_path);

            		$product->main_image = $imageName;
            	}
            }
            //Upload Product Video
            if ($request->hasFile('product_video')) {
            	$video_tmp = $request->file('product_video');
            	//echo '<pre>';print_r($image_tmp);die;
            	if ($video_tmp->isValid()) {
            		$video_name = $video_tmp->getClientOriginalName();
            		$extension = $video_tmp->getClientOriginalExtension();
            		$videoName = $video_name.'-'.rand(111,99999).'.'.$extension;
            		$video_path = "videos/product_videos/";
            		$video_tmp->move($video_path,$videoName);

            		$product->product_video = $videoName;
            	}
            }
        
    		$categoryDetails = Category::find($data['category_id']);
    		$product->section_id = $categoryDetails['section_id'];
        $product->brand_id = $data['brand_id'];
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		$product->product_price = $data['product_price'];
    		$product->product_discount = $data['product_discount'];
    		$product->product_weight = $data['product_weight'];
    		
    		$product->description = $data['description'];
    		$product->wash_care = $data['wash_care'];
    		$product->fabric = $data['fabric'];
    		$product->pattern = $data['pattern'];
    		$product->sleeve = $data['sleeve'];
    		$product->fit = $data['fit'];
    		$product->occasion = $data['occassion'];
    		$product->meta_title = $data['meta_title'];
    		$product->meta_description = $data['meta_description'];
    		$product->meta_keywords = $data['meta_keywords'];
    		$product->is_featured = $is_featured;
    		$product->status = 1;
    		$product->save();

    		  Session::flash('success_message', $message);

    		  return redirect('admin/products');
    		
         }
         // product Filter
         $productFilters = Product::productFilters();
         //echo "<pre>";print_r($productFilters);die;
         $fabricArray = $productFilters['fabricArray'];
         $sleeveArray = $productFilters['sleeveArray'];
         $patternArray = $productFilters['patternArray'];
         $fitArray = $productFilters['fitArray'];
         $occassionArray = $productFilters['occassionArray'];

         //Sections with Category and Subcategory

         $categories = Section::with('categories')->get();
         $categories = json_decode(json_encode($categories),true);
         //echo '<pre>';print_r($categories);die;

         //All Brands
         $brands = Brand::where('status',1)->get();
         $brands = json_decode(json_encode($brands),true);

         return view('admin.products.add_edit_product')->with(compact('title','fabricArray','sleeveArray','patternArray','fitArray','occassionArray','categories','productData','brands'));
    }

    public function deleteProductImage($id)
    {
      $productImage = Product::select('main_image')->where('id',$id)->first();
      $small_imagePath = 'images/product_images/small/';
      $medium_imagePath = 'images/product_images/medium/';
      $large_imagePath = 'images/product_images/large/';

      if (file_exists($small_imagePath.$productImage->main_image)) {
        unlink($small_imagePath.$productImage->main_image);
      }
      if (file_exists($medium_imagePath.$productImage->main_image)) {
        unlink($medium_imagePath.$productImage->main_image);
      }
      if (file_exists($large_imagePath.$productImage->main_image)) {
        unlink($large_imagePath.$productImage->main_image);
      }
      Product::where('id',$id)->update(['main_image'=>'']);

      return redirect()->back()->with('success_message','Product Image has been Deleted Successfully');
    }

    public function deleteProductVideo($id)
    {
      $productVideo = Product::select('product_video')->where('id',$id)->first();
      $videoPath = 'videos/product_videos/';

      if (file_exists($videoPath.$productVideo->product_video)) {
        unlink($videoPath.$productVideo->product_video);
      }
      Product::where('id',$id)->update(['product_video'=>'']);

      return redirect()->back()->with('success_message','Product Video has been Deleted Successfully');
    }

    public function addAttributes(Request $request ,$id)
    {
        if ($request->isMethod('post')) {
          $data = $request->all();
          foreach ($data['sku'] as $key => $value) {

            if (!empty($value)) {
              
              $skuCount = ProductsAttribute::where('sku',$value)->count();
              if ($skuCount>0) {
                return redirect()->back()->with('error_message','SKU alredy exists. Please add another SKU');
              }

              
              $sizeCount = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
              if ($sizeCount>0) {
                return redirect()->back()->with('error_message','Size alredy exists. Please add another Size');
              }

             
              $attribute = new ProductsAttribute;
              $attribute->product_id = $id;
              $attribute->sku = $value;
              $attribute->size = $data['size'][$key];
              $attribute->price = $data['price'][$key];
              $attribute->stock = $data['stock'][$key];
              $attribute->status = 1;
              $attribute->save();
            }
          }
         
         return redirect()->back()->with('success_message','Products Attributes has been added successfully');

        }

        $productData = Product::select('id','product_name','product_code','product_color','main_image')->with('attributes')->find($id);
        $productData = json_decode(json_encode($productData),true);
        //echo '<pre>';print_r($productData);die;
        $title = "Product Attributes";

        return view('admin.products.add_attributes')->with(compact('productData','title'));
    }

    public function editAttributes(Request $request,$id)
    {
        if ($request->isMethod('post')) {
          $data = $request->all();

          foreach ($data['attrId'] as $key => $attr) {
            if (!empty($attr)) {
              ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
          }
          return redirect()->back()->with('success_message','Product attributes has been updated Successfully');
        }
    }

    public function updateAttributeStatus(Request $request)
    {
      if ($request->ajax()) {
        $data = $request->all();
        
            if ($data['status'] == "Active") {
              $status = 0;
            }
            else{
              $status = 1;
            }
            ProductsAttribute::where('id', $data['attribute_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
      }
    }

    public function deleteAttribute($id)
    {
        ProductsAttribute::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Product Attributes has been deleted Successfully');
    }

    public function addImages(Request $request, $id)
    {
      if ($request->isMethod('post')) {
        //$data = $request->all();

        if ($request->hasFile('images')) {
          $images = $request->file('images');

          foreach ($images as $key => $image) {
            $productImage = new productsImage;
            $image_tmp = Image::make($image);
            $extension = $image->getClientOriginalExtension();
            $imageName = rand(111,999999).time().".".$extension;

            $large_image_path = "images/product_images/large/".$imageName;
            $medium_image_path = "images/product_images/medium/".$imageName;
            $small_image_path = "images/product_images/small/".$imageName;

            Image::make($image_tmp)->save($large_image_path);
            Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
            Image::make($image_tmp)->resize(260,300)->save($small_image_path);

            $productImage->image = $imageName;
            $productImage->product_id = $id;
            $productImage->status = 1;
            $productImage->save();
          }

          return redirect()->back()->with('success_message','Product Images has been added Successfully');
        }
      }

      $productData = Product::with('images')->select('id','product_name','product_code','product_color','main_image')->find($id);
      $productData = json_decode(json_encode($productData),true);
      //echo '<pre>';print_r($productdata);die;
      $title = 'Product Images';
      return view('admin.products.add_images')->with(compact('productData','title'));
    }

    public function updateImageStatus(Request $request)
    {
      if ($request->ajax()) {
        $data = $request->all();
        
            if ($data['status'] == "Active") {
              $status = 0;
            }
            else{
              $status = 1;
            }
            ProductsImage::where('id', $data['image_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
      }
    }

     public function deleteImage($id)
    {
      $productImage = ProductsImage::select('image')->where('id',$id)->first();
      $small_imagePath = 'images/product_images/small/';
      $medium_imagePath = 'images/product_images/medium/';
      $large_imagePath = 'images/product_images/large/';

      if (file_exists($small_imagePath.$productImage->image)) {
        unlink($small_imagePath.$productImage->image);
      }
      if (file_exists($medium_imagePath.$productImage->image)) {
        unlink($medium_imagePath.$productImage->image);
      }
      if (file_exists($large_imagePath.$productImage->image)) {
        unlink($large_imagePath.$productImage->image);
      }
      ProductsImage::where('id',$id)->delete();

      return redirect()->back()->with('success_message','Products Images has been Deleted Successfully');
    }

    public function addColors(Request $request, $id)
    {
        if ($request->isMethod('post')) {
          $data = $request->all();
          //dd($data);
          foreach ($data['colors'] as $color) {

            $checkColor = ProductColor::where('product_id',$id)->where('color',$color)->count();
            if ($checkColor>0) {
              return redirect()->back()->with('error_message','Color already exists. Please add another Color');
            }
            $prductColor = new ProductColor();
            $prductColor->product_id = $id;
            $prductColor->color = $color;
            $prductColor->save();           
          }
          return redirect()->back()->with('success_message','Colors added Successfully');
        }
        $title = 'Product Colors';
        $productData = Product::with('colors')->select('id','product_name','product_code','product_color','main_image')->find($id)->toArray();
        return view('admin.products.add_colors')->with(compact('productData','title'));
    }

    public function editColors(Request $request,$id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            foreach ($data['colorId'] as $key => $colorId) {
              ProductColor::where('id',$colorId)->update(['color'=>$data['colors'][$key]]);
            }
            return redirect()->back()->with('success_message','Colors updated Successfully');
        }
    }

    public function deleteColor($id)
    {
        ProductColor::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Product Color has been deleted Successfully');
    }
}
