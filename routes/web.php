<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Category;

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///All Admin Route
Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::match(['get','post'],'/', 'AdminController@login');
    Route::group(['middleware'=>['admin']],function(){
    	//Admin Route
    	Route::get('dashboard', 'AdminController@dashboard');
    	Route::get('settings', 'AdminController@settings');
    	Route::get('logout', 'AdminController@logout');
    	Route::post('check-current-pwd', 'AdminController@check_cur_pass');
    	Route::post('update-current-pwd', 'AdminController@update_current_pwd');
        Route::match(['get','post'], 'admin-details', 'AdminController@admin_details');
        Route::match(['get','post'], 'update-admin-details', 'AdminController@update_admin_details');

        //Create Admin User
        Route::get('users', 'AdminController@users');
        Route::match(['get','post'],'/add-user', 'AdminController@add_user');
        Route::get('delete-user/{id}', 'AdminController@delete_user');
        
        //subscriber Route
        Route::get('subscriber', 'NewsletterController@subscriber');
        Route::post('update-subscriber-status', 'NewsletterController@updateSubscriberStatus');
        Route::get('delete-subscriber/{id}', 'NewsletterController@deleteSubscriber');
        Route::get('subscriber-excel-export', 'NewsletterController@subscriberExcelExport');

        //Sections Route
        Route::get('sections', 'SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus');
        
        //Brands Route
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');
        Route::match(['get','post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand');
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand');
        
        //Category Route
        Route::get('categories', 'CategoryController@categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get','post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
        Route::post('append-category-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory');

        //Products Route
        Route::get('products','ProductsController@products');
        Route::post('update-product-status', 'ProductsController@updateProductStatus');
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct');
        Route::match(['get','post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct');
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage');
        Route::get('delete-product-video/{id}', 'ProductsController@deleteProductVideo');

        //Products Attribute 
        Route::match(['get','post'], 'add-attributes/{id}', 'ProductsController@addAttributes');
        Route::post('edit-attributes/{id}', 'ProductsController@editAttributes');
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id}', 'ProductsController@deleteAttribute');

        //Images
        Route::match(['get','post'], 'add-images/{id}', 'ProductsController@addImages');
        Route::post('update-image-status', 'ProductsController@updateImageStatus');
        Route::get('delete-image/{id}', 'ProductsController@deleteImage');

        //Colors
        Route::match(['get','post'], 'add-colors/{id}', 'ProductsController@addColors');
        Route::post('edit-colors/{id}', 'ProductsController@editColors');
        Route::get('delete-color/{id}', 'ProductsController@deleteColor');

        //Banners Route
        Route::get('banners', 'BannersController@banners');
        Route::match(['get','post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus');
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner');  
        
        //Coupons Route
        Route::get('coupons', 'CouponsController@coupons');
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus');
        Route::match(['get','post'], 'add-edit-coupon/{id?}', 'CouponsController@addEditCoupon');
        Route::get('delete-coupon/{id}', 'CouponsController@deleteCoupon');
        
        //Orders Route
        Route::get('orders','OrderController@orders');
        Route::get('orders/{id}','OrderController@orderDetails');
        Route::post('update-order-status','OrderController@updatOrderStatus');
        Route::get('view-order-invoice/{id}','OrderController@viewOrderInvoice');
        Route::get('print-pdf-invoice/{id}','OrderController@printPDFInvoice');

        //Blogs Route
        Route::get('blogs','BlogsController@view');
        Route::match(['get','post'], 'add-edit-blog/{id?}', 'BlogsController@addEditBlog');
        Route::post('update-blog-status', 'BlogsController@updateBlogStatus');
        Route::get('delete-blog/{id}', 'BlogsController@deleteBlog');
        Route::get('blog-category','BlogsController@viewCategory');
        Route::post('add-post-category','BlogsController@addCategory');
        Route::get('delete-blogcategory/{id}', 'BlogsController@deleteBlogCategory');
        Route::get('blog-tag','BlogsController@viewTag');
        Route::post('add-post-tag','BlogsController@addTag');
        Route::get('delete-blogtag/{id}', 'BlogsController@deleteBlogTag');
    });
    
});


////Front Route
Route::namespace('Front')->group(function(){
   //HomePage Route
   Route::get('/', 'IndexController@index');

   //Category Listing Route
   $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
   foreach ($catUrls as $url) {
      Route::match(['get','post'],'/'.$url, 'ProductsController@listing');
   }

   //Detail Page Route
   Route::get('/product/{id}', 'ProductsController@detail');
   
   //Get Product Attribute Price
   Route::post('/get-product-price', 'ProductsController@getProductPrice');
   
   //Add to Cart Route
   Route::post('/add-to-cart', 'ProductsController@addtocart');
   
   //Shopping Cart Route
   Route::get('/cart', 'ProductsController@cart');
   
   //Update Cart Item Quantity
   Route::post('/update-cart-item-qty', 'ProductsController@updateCartItemQty');
   
   //Delete Cart Item
   Route::post('/delete-cart-item', 'ProductsController@deleteCartItem');
   
   //Login Route
   Route::get('/login', 'UsersController@login')->name('login');
   Route::post('/login-user', 'UsersController@loginUser');
   
   //Social Login Route Facebook
   Route::get('auth/facebook', 'SocialController@facebookRedirect');
   Route::get('auth/facebook/callback', 'SocialController@loginWithFacebook');
   
   //Social Login Route Google
   Route::get('auth/google', 'SocialController@googleRedirect');
   Route::get('auth/google/callback', 'SocialController@loginWithGoogle');

   //Register Route
   Route::get('/register', 'UsersController@register');
   Route::post('/reload-captcha', 'UsersController@reloadCaptcha');
   Route::post('/register-user', 'UsersController@registerUser');
   
   //Login Route
   Route::post('/login-user', 'UsersController@loginUser');
   
   //Check Email User exists
   Route::match(['get','post'],'/check-email', 'UsersController@checkEmail');
   
   //Confirm Account
   Route::match(['get','post'],'/confirm/{code}', 'UsersController@confirmAccount');

   //Logout
   Route::match(['get','post'],'/logout', 'UsersController@logout');
   
   //Forgot Password
   Route::match(['get','post'], '/forgot-password', 'UsersController@forgotPassword');
   Route::match(['get','post'], '/reset-password/{token?}', 'UsersController@resetPassword');
   
   Route::group(['middleware'=>['auth']],function(){
       
       //Users Account Route
       Route::get('/account', 'UsersController@account');
       Route::match(['get','post'], '/order-details', 'OrderController@oderDetails');
       Route::post('/update-details', 'UsersController@updateDetails');
       Route::get('/account/orders', 'UsersController@myOrder');
       Route::match(['get','post'],'/check-password', 'UsersController@checkPassword');
       //Apply Coupon
       Route::post('/apply-coupon', 'ProductsController@applyCoupon'); 
       //Checkout Route
       Route::match(['get','post'], '/checkout', 'ProductsController@checkout');
       //Rating Route
       Route::match(['get','post'], '/product-rating', 'RatingController@productRating');
       //Thanks Page
       Route::get('/thanks', 'ProductsController@thanks');
       //Wishlist Page
       Route::get('/wishlist', 'WishlistController@wishlist');
       Route::post('/add-to-wishlist', 'WishlistController@addWishlist');
       Route::post('/remove-wishlist', 'WishlistController@removeWishlist');
       //Compare Page
       Route::get('/compare', 'CompareController@compare');
       Route::post('/add-to-compare', 'CompareController@addCompare');
       Route::post('/remove-compare', 'CompareController@removeCompare');
   });

   //Blog Page Route
   Route::get('/blogs', 'BlogsController@blogs');
   Route::get('/blog-category/{slug}', 'BlogsController@blogCategory');
   Route::get('/blog-tag/{slug}', 'BlogsController@blogTag');
   Route::get('/blog-search', 'BlogsController@blogSearch');
   Route::get('/blog-detail/{slug}', 'BlogsController@blogDetail');
   
   //Blog COmment Route
   Route::post('/comments/{id}', 'CommentsController@comment');
   Route::post('/comment-reply/{comment_id}', 'CommentsController@commentReply');
   
   //Subscribe Newsletter Route
   Route::post('/add-subscribe-email', 'NewsletterController@addSubscribeEmail'); 
   
});
