
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
          <br>
          </div>
          <div class="pull-left info">
            <p>Super Admin</p>
            <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
          <li class="header"></li>


          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-building"></i>
                  <span>Website</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" >
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/banner') }}"><i class="fa fa-image"></i> <span>Banner</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/about') }}"><i class="fa fa-info-circle"></i> <span>About</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/faq_category') }}"><i class="fa fa-question-circle"></i> <span>FAQ Category</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/faq') }}"><i class="fa fa-question"></i> <span>FAQ</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/journal') }}"><i class="fa fa-file-text-o"></i> <span>Journal</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/company_data') }}"><i class="fa fa-facebook"></i> <span>Company Data</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/ring_sizer') }}"><i class="fa fa-sliders"></i> <span>Ring Sizer</span></a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Commerce</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" >
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/category') }}"><i class="fa fa-life-ring"></i> <span>Category</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/sub_category') }}"><i class="fa fa-tag"></i> <span>Sub Category</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/color') }}"><i class="fa fa-paint-brush"></i> <span>Color</span></a></li>

                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/product') }}"><i class="fa fa-diamond"></i> <span>Product</span></a></li>
                </ul>
              </li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/quotation') }}"><i class="fa fa-envelope"></i> <span>Quotation</span></a></li>
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/contact') }}"><i class="fa fa-envelope"></i> <span>Contact</span></a></li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/admin') }}"><i class="fa fa-user"></i> <span>Admin</span></a></li>

          
          

         
        

          <!-- ======================================= -->
          <!-- <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
