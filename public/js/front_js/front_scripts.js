$(document).ready(function(){
	//Csrf Token
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // Laravel Ajax Pagination
    $(document).on("click", ".listing_pagi .pagination a", function(e){
       e.preventDefault();
       
       var grid_list = $("#grid_list .active").attr('href');
       var page = $(this).attr('href').split('page=')[1];
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $("#show_more option:selected").val();
       var sort = $("#sort option:selected").val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url+"?page="+page,
        method:"get",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });
   ///Laravel Grid / List View
    $("#grid_list .grid").on("click", function(e){
       e.preventDefault();
       $("#grid_list a").removeClass('active');
       $(this).addClass('active');
       $("#grid_list a").removeAttr('href')
       $(this).attr('href','grid');
       var grid_list = $(this).attr('href');
       // alert(grid);
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $("#show_more option:selected").val();
       var sort = $("#sort option:selected").val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });
    ////List View
    $("#grid_list .list").on("click", function(e){
      e.preventDefault();
       $("#grid_list a").removeClass('active');
       $(this).addClass('active');
       $("#grid_list a").removeAttr('href')
       $(this).attr('href','list');
       var grid_list = $(this).attr('href');
       // alert(grid_list);
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $("#show_more option:selected").val();
       var sort = $("#sort option:selected").val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });
  ///End Laravel Grid / List View

  ////Laravel Filter
    $("#sort").on("change", function(){
      var grid_list = $("#grid_list .active").attr('href');
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $("#show_more option:selected").val();
       var sort = $(this).val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });
  ////Laravel Filter Show-filter
    $("#show_more").on("change", function(){
      var grid_list = $("#grid_list .active").attr('href');
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $(this).val();
       var sort = $("#sort option:selected").val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });

  $("#price_range_filter").on("click", function(){
      var grid_list = $("#grid_list .active").attr('href');
       var minprice = $("#minimum_price").val();
       var maxprice = $("#maximum_price").val();
       var show = $("#show_more option:selected").val();
       var sort = $("#sort option:selected").val();
       var url = $("#url").val();
       var fabric = get_filter('fabric');
       var sleeve = get_filter('sleeve');
       var pattern = get_filter('pattern');
       var fit = get_filter('fit');
       var occassion = get_filter('occassion');
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
  });

    $(".fabric").on("click",function(){
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var fabric = get_filter('fabric');
      var sleeve = get_filter('sleeve');
      var pattern = get_filter('pattern');
      var fit = get_filter('fit');
      var occassion = get_filter('occassion');
        var show = $("#show_more option:selected").val();
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
    });

    $(".sleeve").on("click",function(){
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var fabric = get_filter('fabric');
      var sleeve = get_filter('sleeve');
      var pattern = get_filter('pattern');
      var fit = get_filter('fit');
      var occassion = get_filter('occassion');
        var show = $("#show_more option:selected").val();
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
    });

    $(".pattern").on("click",function(){
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var fabric = get_filter('fabric');
      var sleeve = get_filter('sleeve');
      var pattern = get_filter('pattern');
      var fit = get_filter('fit');
      var occassion = get_filter('occassion');
        var show = $("#show_more option:selected").val();
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
    });

    $(".fit").on("click",function(){
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var fabric = get_filter('fabric');
      var sleeve = get_filter('sleeve');
      var pattern = get_filter('pattern');
      var fit = get_filter('fit');
      var occassion = get_filter('occassion');
        var show = $("#show_more option:selected").val();
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
    });

    $(".occassion").on("click",function(){
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var fabric = get_filter('fabric');
      var sleeve = get_filter('sleeve');
      var pattern = get_filter('pattern');
      var fit = get_filter('fit');
      var occassion = get_filter('occassion');
        var show = $("#show_more option:selected").val();
        var sort = $("#sort option:selected").val();
        var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });
    });
   //Filter
    function get_filter(class_name){
      var filter = [];
      $('.'+class_name+':checked').each(function(){
             filter.push($(this).val());
      });
      return filter;
    }

    //Price Slider activation
    $("#price_range").slider({
        range:true,
        min:0,
        max:2000,
        values: [ 0, 2000 ],
        step:100,
        stop:function(event, ui) {
          $("#price_show").html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          $("#minimum_price").val(ui.values[0]);
          $("#maximum_price").val(ui.values[1]);
        }

    });
    //Pagination Link add Next Previous
   $('.pagination li:last-child .page-link').html('Next');
   $('.pagination li:first .page-link').html('Previous');

   ///////////////////////   Remove Filter \\\\\\\\\\\\\\\\\\\

   //When Filter Check Uncheck then Remove filter show and hide
   $('.clear-filter ').on('click','input[type=checkbox]',function(){
       const logic = $(this).prop('checked');
       const custom_class = $(this).attr('custom-class');

       if (logic) {
           var clear_filter = $(this).attr('custom-id');
           var filter_value = $(this).attr('id');
           var filter = "<span style='font-size:12px;margin-right:10px;' class='btn btn-sm btn-secondary "+custom_class+" "+clear_filter+"' clear='"+clear_filter+"' value='"+filter_value+"'>"+filter_value+" <i style='font-size:12px;' class='fas fa-times'></i></span>";

           $('.filter_wrapper').append(filter);
       }else{
           $('.filter_wrapper .'+$(this).attr('custom-id')).remove();
       }
   });

   ////Fabric Remove Filter
   $('.filter_wrapper').on('click','.fabric',function(){
      ///Uncheck button and remove item
      var item = $(this).attr('clear');
      $('.clear-filter .'+item).prop('checked',false);
      $(this).remove();
      ///Uncheck button and remove item

      var fabric = get_filter_remove('fabric');
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var sleeve = get_filter_remove('sleeve');
      var pattern = get_filter_remove('pattern');
      var fit = get_filter_remove('fit');
      var occassion = get_filter_remove('occasion');
      var show = $("#show_more option:selected").val();
      var sort = $("#sort option:selected").val();
      var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });

   });
   
   ////Sleeve Remove Filter
   $('.filter_wrapper').on('click','.sleeve',function(){
      ///Uncheck button and remove item
      var item = $(this).attr('clear');
      $('.clear-filter .'+item).prop('checked',false);
      $(this).remove();
      ///Uncheck button and remove item

      var fabric = get_filter_remove('fabric');
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var sleeve = get_filter_remove('sleeve');
      var pattern = get_filter_remove('pattern');
      var fit = get_filter_remove('fit');
      var occassion = get_filter_remove('occasion');
      var show = $("#show_more option:selected").val();
      var sort = $("#sort option:selected").val();
      var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });

   });

   ////Pattern Remove Filter
   $('.filter_wrapper').on('click','.pattern',function(){
      ///Uncheck button and remove item
      var item = $(this).attr('clear');
      $('.clear-filter .'+item).prop('checked',false);
      $(this).remove();
      ///Uncheck button and remove item

      var fabric = get_filter_remove('fabric');
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var sleeve = get_filter_remove('sleeve');
      var pattern = get_filter_remove('pattern');
      var fit = get_filter_remove('fit');
      var occassion = get_filter_remove('occasion');
      var show = $("#show_more option:selected").val();
      var sort = $("#sort option:selected").val();
      var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });

   })

   ////Fit Remove Filter
   $('.filter_wrapper').on('click','.fit',function(){
      ///Uncheck button and remove item
      var item = $(this).attr('clear');
      $('.clear-filter .'+item).prop('checked',false);
      $(this).remove();
      ///Uncheck button and remove item

      var fabric = get_filter_remove('fabric');
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var sleeve = get_filter_remove('sleeve');
      var pattern = get_filter_remove('pattern');
      var fit = get_filter_remove('fit');
      var occassion = get_filter_remove('occasion');
      var show = $("#show_more option:selected").val();
      var sort = $("#sort option:selected").val();
      var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });

   });

   ////Occasion Remove Filter
   $('.filter_wrapper').on('click','.occasion',function(){
      ///Uncheck button and remove item
      var item = $(this).attr('clear');
      $('.clear-filter .'+item).prop('checked',false);
      $(this).remove();
      ///Uncheck button and remove item

      var fabric = get_filter_remove('fabric');
      var grid_list = $("#grid_list .active").attr('href');
      var minprice = $("#minimum_price").val();
      var maxprice = $("#maximum_price").val();
      var sleeve = get_filter_remove('sleeve');
      var pattern = get_filter_remove('pattern');
      var fit = get_filter_remove('fit');
      var occassion = get_filter_remove('occasion');
      var show = $("#show_more option:selected").val();
      var sort = $("#sort option:selected").val();
      var url = $("#url").val();
       $.ajax({
        url:url,
        method:"post",
        data: {show:show,grid_list:grid_list,minprice:minprice,maxprice:maxprice,fabric:fabric,sleeve:sleeve,pattern:pattern,fit:fit,occassion:occassion,sort:sort,url:url},
        success:function(data){
          $('.filter_products').html(data);
          //1 to 4 of 100 show product
          var show_of_show = $('.show_of_show').html();
          $('.show_of_shows').html(show_of_show);
          //include pagination text
          $('.pagination li:last-child .page-link').html('Next');
          $('.pagination li:first .page-link').html('Previous');
        }
       });

   });

   //Filter Remove
    function get_filter_remove(class_name){
      var filter = [];
      //alert($('.'+class_name).attr('clear'));
      $('.filter_wrapper span.'+class_name).each(function(){
             filter.push($(this).attr('value'));
      });
      return filter;
    }

    //get Product Single Page attributes Price and Size
    $("#getPrice").change(function(){
        var size = $(this).val();
        if (size=='') {
          alert('Please select size');
          return false;
        }
        var product_id = $(this).attr('product-id');
        
        $.ajax({
          url: '/get-product-price',
          data: {size:size,product_id:product_id},
          type: 'post',
          success:function(resp){
             if (resp['discount'] > 0) {
                 $(".getAttrPrice").html("$"+resp['final_price'] + "<del class='text-muted h6'>"+"  $"+ resp['product_price']+"</del>");
             }else{
                 $(".getAttrPrice").html("$ "+resp['product_price']);
             }
             
          },error:function(){
            alert("Error");
          }
        });
    });

    //Upadte Cart Items
    $(document).on('click','.btnItemUpdate',function(){

        if ($(this).hasClass('qtyMinus')) {
          var quantity = $(this).next().val();
          if (quantity <= 1) {
            alert('Item quantity must be 1 or greater!');
            return false;
          }
          else{
            new_qty = parseInt(quantity) - 1;
          }
        }

        if ($(this).hasClass('qtyPlus')) {
          var quantity = $(this).prev().val();
          new_qty = parseInt(quantity) + 1;
        }
        var cartid = $(this).attr('data-cartid');

        $.ajax({
            data:{"cartid":cartid,"qty":new_qty},
            url:'/update-cart-item-qty',
            type:'post',
            beforeSend:function(){
              //Start loader
               $('#preloader_back').show();
               $('#appendCartItems #cart-preloader').show();
            },
            success:function(resp){
              if (resp.status == false) {
                alert('Product Stock is not available');
                return false;
              }
              // Cart View
              $('#appendCartItems').html(resp.view);
              //Mini Cart View
              $('#appendMiniCartItems').html(resp.mini_cart_view);
              $('.totalCartItems').attr('data-cart-items',resp.totalCartItems);
            },error(){
              alert(Error);
            },complete:function(){
              // Hide Loader
               $('#preloader_back').hide();
               $('#appendCartItems #cart-preloader').hide();
            }
        });
    });

    //Button Items Delete
    $(document).on('click','.btnItemDelete',function(e){
        e.preventDefault();
        var cartid = $(this).attr('data-cartid');
        var result = confirm('Want to delete this cart item');
        if (result) {
           $.ajax({
              data:{"cartid":cartid},
              url:'/delete-cart-item',
              type:'post',
              success:function(resp){
                $('#appendCartItems').html(resp.view);
                $('.totalCartItems').attr('data-cart-items',resp.totalCartItems);
              },error(){
                alert(Error);
              }
          });
        }
       
    });

    //Captcha Code Reload
    $('#reload').click(function(){
        $.ajax({
           type:'post',
           url:'/reload-captcha',
           success:function(resp){
              $(".captcha span").html(resp.captcha);
           },error:function(){
            alert('Error');
           }
        });
    });
    //My Account Tab Panel Link Change
    $('.dashboard_menu ul li a').click(function(){
        window.location.href = $(this).attr('href');
    });
    //MyAccount Tab panel Active or not
    $(document).ready(function(){
      
       var location = window.location.href;
       var res = location.split("#");
       if (res[1] == undefined) {
          $('.dashboard_menu ul li #dashboard-tab').addClass('active');
          $('#dashboard').addClass('active show');
       }
       $('#'+res[1]).addClass('active show');
       $('.dashboard_menu ul li').each(function(){
           var href = $(this).children('a').attr('href');

           if (href == '#'+res[1]) {
            //alert(href);
            $(this).children('a').addClass('active');
           }
       });
    });
    //End MyAccount Tab panel Active or not

    //Check Password
    $('#current_password').keyup(function(){
       var current_pwd = $(this).val();

       $.ajax({
          type:'post',
          url:'/check-password',
          data:{current_pwd:current_pwd},
          success:function(resp){
             if (resp=="false") {
              $('#check_password_error').removeClass('text-success');
              $('#check_password_error').addClass('text-danger');
              $('#check_password_error').html('Current Password is Wrong');
             }else{
              $('#check_password_error').removeClass('text-danger');
              $('#check_password_error').addClass('text-success');
              $('#check_password_error').html('Current Password is Correct');
             }
          },error:function(){
            alert("Error");
          }
       });
    });

    //Apply Coupon
    $(document).on('submit','#ApplyCoupon',function(){
      
        var user = $(this).attr('user');
        if (user == 1) {

        }else{
          alert('Please login to Apply Coupon!');
          return false;
        }
        var coupon = $('#coupon').val();

        $.ajax({
          type:'post',
          data:{coupon:coupon},
          url:'/apply-coupon',
          success:function(resp){
              alert(resp.message);
              $('#appendCartItems').html(resp.view);
              $('#checkout_items').html(resp.checkout_items);
              $('.totalCartItems').attr('data-cart-items',resp.totalCartItems);
              // $('.couponAmount').html("$"+resp.couponAmount.toFixed(2));
              // $('.grandTotal').html("$"+resp.grandTotal.toFixed(2));
          
          },error:function(){
            alert("Error");
          }
        })
    });

    //Shipping another address
    $('.checkout-toggle').click(function(){
        if (this.checked) {
          $('.different-address').slideDown(1000);
        }else{
          $('.different-address').slideUp(1000);
        }
    });

    // Rating Color System
    $(document).on('click','.star',function(){

       var star = $(this).val();
       // $(this + 'i').css('color','black');
       $('.star').each(function(){
          $(this).next().css('color','black');
       });

       if (this.checked) {
          $(this).next().css('color','#FFC107');
       }

    });

    //Order Details
    $(document).on('click','.orderDetails',function(){
        var order_id = $(this).attr('order-id');
        // alert(order_id);
        $.ajax({
           url: "/order-details",
           method:"post",
           data:{order_id:order_id},
           success:function(resp){
            $('.all-order').hide();
            $('#orders').append(resp.view);
           },error:function(){
            alert("Error");
           }
        });
    });

    //Order List with Order Details
    $(document).on('click','.orderList',function(){
       $('.single_order').hide();
       $('.all-order').show();
    });

    //Add to Wishlist
    $(document).on('click','.add_to_wishlist',function(){
        var user_id = $(this).attr('user-id');
        var product_id = $(this).attr('product-id');
        var quantity = 1; 

        if (!user_id) {
           Swal.fire({
              position: 'middle',
              icon: 'none',
              text: 'You must be login to add wishlist product',
              showConfirmButton: false,
              timer: 3000
            })
           return false;
        }
        
        $.ajax({
           url:'/add-to-wishlist',
           method:'post',
           data:{user_id:user_id,product_id:product_id,quantity:quantity},
           success:function(resp){
            $('.totalWishlists').attr('data-cart-items',resp.totalWishlists);
            // alert(resp.message);
            Swal.fire({
              position: 'middle',
              icon: 'none',
              text: resp.message,
              showConfirmButton: false,
              timer: 3000
            })
           },error:function(){
            alert("Error");
           }
        });
    });
    // Remove Wishlist
    $(document).on('click','.close-wishlist',function(){
       var product_id = $(this).attr('product-id');

       $.ajax({
          url:'remove-wishlist',
          method:'post',
          data:{product_id:product_id},
          success:function(resp){
            //Message
            Swal.fire({
              position: 'middle',
              icon: 'none',
              text: 'Your wishlist item is deleted..',
              showConfirmButton: false,
              timer: 3000
            })

            $('#appendWishlist').html(resp.view);
            $('.totalWishlists').attr('data-cart-items',resp.totalWishlists);
          },error:function(){
            alert("Error");
          }
       });
    });

    //Add to Compare
    $(document).on('click','.add_to_compare',function(){
        var user_id = $(this).attr('user-id');
        var product_id = $(this).attr('product-id'); 

        if (!user_id) {
           Swal.fire({
              position: 'middle',
              icon: 'none',
              text: 'You must be login to add compare product',
              showConfirmButton: false,
              timer: 3000
            })
           return false;
        }
        
        $.ajax({
           url:'/add-to-compare',
           method:'post',
           data:{user_id:user_id,product_id:product_id},
           success:function(resp){
            // $('.totalWishlists').attr('data-cart-items',resp.totalWishlists);
            // alert(resp.message);
            Swal.fire({
              position: 'middle',
              icon: 'none',
              text: resp.message,
              showConfirmButton: false,
              timer: 3000
            })
           },error:function(){
            alert("Error");
           }
        });
    });
    // Remove Wishlist
    $(document).on('click','.close-compare',function(){
       var product_id = $(this).attr('product-id');

       $.ajax({
          url:'remove-compare',
          method:'post',
          data:{product_id:product_id},
          success:function(resp){
            //Message
            Swal.fire({
              position: 'middle',
              icon: 'none',
              text: 'Your compare item is deleted..',
              showConfirmButton: false,
              timer: 3000
            })

            // $('#appendWishlist').html(resp.view);
            // $('.totalWishlists').attr('data-cart-items',resp.totalWishlists);
          },error:function(){
            alert("Error");
          }
       });
    });

    //Show or hidden Reply Form
    $(document).on('click','.comment-reply',function(){
        $('.comment_reply_form').hide();
        var comment_name = $(this).attr('comment-name');
        var comment_id = $(this).attr('comment-id');

        if (comment_name) {
          $('.comment_reply_form-'+comment_id).show();
          $('.form_reply').html('@'+comment_name);
        }else{
          $('.comment_reply_form-'+comment_id).show();
          $('.form_reply').html(' ');
        }
        //Scroll 
        var height = $('.comment_reply_form-'+comment_id).offset().top;
        var div_height = $('.comment_reply_form').height();

       $('html, body').animate({
            scrollTop: height - div_height
        }, 1000);
        
    });

    //Cancel Post Reply Form
    $(document).on('click','.cancel_comment_reply_form',function(){
        $('.comment_reply_form').hide();
    });

    //Subscribe Newsletter Added
    $('#subscribe').submit(function(){
       var subscribe_email = $("#subscribe_email").val();
       // alert(subscribe_email);
       $.ajax({
          type:'post',
          url:'/add-subscribe-email',
          data:{subscribe_email:subscribe_email},
          success:function(resp){

            if (resp.message == "exists") {
              //Message
              Swal.fire({
                position: 'middle',
                icon: 'none',
                text: 'Email already exists',
                showConfirmButton: false,
                timer: 3000
              })
            }else if (resp.message=="saved") {
              //Message
              Swal.fire({
                position: 'middle',
                icon: 'none',
                text: 'Thanks for subscribing!',
                showConfirmButton: false,
                timer: 3000
              })
              $("#subscribe_email").val(' ');
            }

          },error:function(){
            alert("Error");
          }
       });
    });

});
