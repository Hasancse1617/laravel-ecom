$(document).ready(function(){

///////Upload Video / Audio / Image AND Instanse Show

    $('#file').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('.showFile').attr('src',e.target.result);
        var attr = $('.showFile').attr('src');
        var extension = attr.split('/');
        //alert(extension[0]);
        if (extension[0] == 'data:image') {
            $('.read-image').removeClass('d-none');
            $('.read-video').addClass('d-none');
            $('.read-audio').addClass('d-none');
        }else if (extension[0] == 'data:video') {
            $('.read-image').addClass('d-none');
            $('.read-video').removeClass('d-none');
            $('.read-audio').addClass('d-none');
        }else if (extension[0] == 'data:audio') {
            $('.read-image').addClass('d-none');
            $('.read-video').addClass('d-none');
            $('.read-audio').removeClass('d-none');
        }
      }
      reader.readAsDataURL(e.target.files['0']);
    });

///////Upload Image AND Instanse Show
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });

///Check Current Password
	$('#current_pwd').keyup(function(){
        var current_pwd = $('#current_pwd').val();
      
        $.ajax({
           type : 'post',
           url : '/admin/check-current-pwd',
           data : {current_pwd:current_pwd},
           success:function(resp){
              if (resp == 'False') {
                $('#check_p').html("<font color='red'>Current password is Incorrect</font>");
              }
              else{
                $('#check_p').html("<font color='green'>Current password is Correct</font>");
              }
           },error:function(){
              alert("Error");
           }
        });
	});

  //$('.updateSectionStatus').click(function(){
  $(document).on('click','.updateSectionStatus',function(){   
     var status = $(this).children("i").attr("status");
     var section_id = $(this).attr("section_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-section-status',
        data : {status:status,section_id:section_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#section-"+section_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#section-"+section_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });


  //$('.updatesubscriberStatus').click(function(){
  $(document).on('click','.updatesubscriberStatus',function(){   
     var status = $(this).children("i").attr("status");
     var subscriber_id = $(this).attr("subscriber_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-subscriber-status',
        data : {status:status,subscriber_id:subscriber_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#subscriber-"+subscriber_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#subscriber-"+subscriber_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });


   //Brands Status
  //$('.updateBrandStatus').click(function(){
  $(document).on('click','.updateBrandStatus',function(){   
     var status = $(this).children("i").attr("status");
     var brand_id = $(this).attr("brand_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-brand-status',
        data : {status:status,brand_id:brand_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#brand-"+brand_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#brand-"+brand_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });

  
   //Banner Status

  $(document).on('click','.updateBannerStatus',function(){   
     var status = $(this).children("i").attr("status");
     var banner_id = $(this).attr("banner_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-banner-status',
        data : {status:status,banner_id:banner_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#banner-"+banner_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#banner-"+banner_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });
   //Coupon Status

  $(document).on('click','.updateCouponStatus',function(){   
     var status = $(this).children("i").attr("status");
     var coupon_id = $(this).attr("coupon_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-coupon-status',
        data : {status:status,coupon_id:coupon_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#coupon-"+coupon_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });

  
//Category Scripts
  //$('.updateCategoryStatus').click(function(){
  $(document).on('click','.updateCategoryStatus',function(){  
     var status = $(this).children("i").attr("status");
     var category_id = $(this).attr("category_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-category-status',
        data : {status:status,category_id:category_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#category-"+category_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#category-"+category_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });

//Update Blog Status
  $(document).on('click','.updateBlogStatus',function(){  
     var status = $(this).children("i").attr("status");
     var blog_id = $(this).attr("blog_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-blog-status',
        data : {status:status,blog_id:blog_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#blog-"+blog_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#blog-"+blog_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });

///Append Category Level
  $('#section_id').change(function(){
      var section_id = $(this).val();
      $.ajax({
        type: 'post',
        url: '/admin/append-category-level',
        data: {section_id:section_id},
        success:function(resp){
           $('#appendCategoryLevel').html(resp);
        },error:function(){
          alert("Error");
        }
      });
  });

////Delete Jquery
  $(document).on('click','.confirmDelete',function(){
    var record = $(this).attr("record");
    var recordid = $(this).attr("recordid");

     Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = ("/admin/delete-"+record+"/"+recordid);
        }
      })

   });

  //Products Status Scripts
  $('.updateProductStatus').click(function(){
    
     var status = $(this).children("i").attr("status");
     var product_id = $(this).attr("product_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-product-status',
        data : {status:status,product_id:product_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#product-"+product_id).html("<i class='fas fa-toggle-off' aria-hidden='true' status='Inactive'></i>");
           }
           else if (resp['status'] == 1) {
            $("#product-"+product_id).html("<i class='fas fa-toggle-on' aria-hidden='true' status='Active'></i>");
           }
        },error:function(){
          alert("Error");
        }

     });

  });

  //Attribute Scripts
  $('.updateAttributesStatus').click(function(){
    
     var status = $(this).text();
     var attribute_id = $(this).attr("attribute_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-attribute-status',
        data : {status:status,attribute_id:attribute_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#attribute-"+attribute_id).html('Inactive');
           }
           else if (resp['status'] == 1) {
            $("#attribute-"+attribute_id).html('Active');
           }
        },error:function(){
          alert("Error");
        }

     });

  });

  //Iimage  Scripts
  $('.updateImagesStatus').click(function(){
    
     var status = $(this).text();
     var image_id = $(this).attr("image_id");
     $.ajax({
        type : 'post',
        url : '/admin/update-image-status',
        data : {status:status,image_id:image_id},
        success:function(resp){
           if (resp['status'] == 0) {
            $("#image-"+image_id).html('Inactive');
           }
           else if (resp['status'] == 1) {
            $("#image-"+image_id).html('Active');
           }
        },error:function(){
          alert("Error");
        }

     });

  });


   // Products Attributes
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:10px;"><input type="text" id="size" name="size[]" value="" placeholder="Size" style="width:110px;" required=""/>&nbsp;<input type="text" id="sku" name="sku[]" value="" placeholder="SKU" style="width:110px;" required=""/>&nbsp;<input type="number" id="price" name="price[]" value="" placeholder="Price" style="width:110px;" required=""/>&nbsp;<input type="number" id="stock" name="stock[]" value="" placeholder="Stock" style="width:110px;" required=""/><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
   
    ////Add multiple Color
    var max = 10;
    var x = 1;
    var colorHtml = '<div style="margin-top:10px;"><input type="text" id="colors" name="colors[]" value="" placeholder="Add Prodfuct Color" required="" /><a href="javascript:void(0);" class="remove_button_colors" title="Remove field">Remove</a></div>'
    $('.add_button_colors').on('click',function(){
       if (x < max) {
          x++;
         $('.field_wrapper_colors').append(colorHtml);
       }
    });
    $('.field_wrapper_colors').on('click','.remove_button_colors',function(){
       $(this).parent('div').remove();
    });

    //Show / Hide COupon Field
    $('#AutometicCoupon').click(function(){
        $('#couponField').hide();
    });
    $('#ManualCoupon').click(function(){
        $('#couponField').show();
    });

     //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //when Order shipped then Courier and Tracking number Show
    $(document).on('change','#order_status',function(){
        var status = $(this).val();
        if (status == 'Shipped') {
          $('#courier_tracking_show').show();
        }
        else{
          $('#courier_tracking_show').hide();
        }
    });
});