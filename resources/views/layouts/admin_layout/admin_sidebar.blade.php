 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      <img src="{{ url('images/admin_images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ (!Auth::guard('admin')->user()->image)? url('images/admin_images/admin_photos/avatar.png') : url('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if(Session::get('page')=="dashboard")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
             @if(Session::get('page')=="users")
              <?php $active = "active"; ?>
             @else
              <?php $active = ""; ?>
             @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Session::get('page')=="users")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/users') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>        
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
             @if(Session::get('page')=="subscriber")
              <?php $active = "active"; ?>
             @else
              <?php $active = ""; ?>
             @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Subscriber
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Session::get('page')=="subscriber")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/subscriber') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Subscriber</p>
                </a>
              </li>        
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
             @if(Session::get('page')=="settings" || Session::get('page')=="admin-details")
              <?php $active = "active"; ?>
             @else
              <?php $active = ""; ?>
             @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Session::get('page')=="settings")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/settings') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
                </a>
              </li>
              <li class="nav-item">
                @if(Session::get('page')=="admin-details")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/admin-details') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Details</p>
                </a>
              </li>
        
            </ul>
          </li>

           <!-- Catelogues  -->
          <li class="nav-item has-treeview menu-open">
             @if(Session::get('page')=="sections" || Session::get('page')=="brands" || Session::get('page')=="categories" || Session::get('page')=="products" || Session::get('page')=="banners"||Session::get('page')=="coupons"||Session::get('page')=="orders")
              <?php $active = "active"; ?>
             @else
              <?php $active = ""; ?>
             @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Catelogues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Session::get('page')=="sections")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/sections') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
              <li class="nav-item">
                @if(Session::get('page')=="brands")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/brands') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                @if(Session::get('page')=="categories")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/categories') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>

              <li class="nav-item">
                @if(Session::get('page')=="products")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/products') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              
              <li class="nav-item">
                @if(Session::get('page')=="banners")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/banners') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
              
              <li class="nav-item">
                @if(Session::get('page')=="coupons")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/coupons') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupons</p>
                </a>
              </li>
              
              <li class="nav-item">
                @if(Session::get('page')=="orders")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/orders') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
        
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
             @if(Session::get('page')=="blogs")
              <?php $active = "active"; ?>
             @else
              <?php $active = ""; ?>
             @endif
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Blogs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if(Session::get('page')=="blog_category")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/blog-category') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li> 
              <li class="nav-item">
                @if(Session::get('page')=="blog_tag")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/blog-tag') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag</p>
                </a>
              </li> 
              <li class="nav-item">
                @if(Session::get('page')=="blogs")
                <?php $active = "active"; ?>
               @else
                <?php $active = ""; ?>
               @endif
                <a href="{{ url('/admin/blogs') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>        
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>