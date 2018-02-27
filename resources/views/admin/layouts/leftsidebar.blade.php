<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">     
      <li class="active">
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span>            
          </a>          
        </li>   
      
              
        
       <li class="treeview">
          <a href="">
           <i class="fa fa-gears" aria-hidden="true"></i><span>Settings</span>  
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">             
            <li class="active"><a href="{{ url('/admin/cities') }}"><i class="fa fa-circle-o"></i>Cities</a></li>
            <li><a href="{{ url('/admin/companies') }}"><i class="fa fa-circle-o"></i> Companies</a></li>    
            <li><a href="{{ url('/admin/cities-companies') }}"><i class="fa fa-circle-o"></i> Cities and Companies</a></li>
            <li><a href="{{ url('/admin/categories') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="{{ url('/admin/inclusions') }}"><i class="fa fa-circle-o"></i> Inclusions</a></li>  
            <li><a href="{{ url('/admin/equipments') }}"><i class="fa fa-circle-o"></i> Equipments</a></li>
            <li><a href="{{ url('/admin/additional-services') }}"><i class="fa fa-circle-o"></i> Additional Services</a></li>
            <li><a href="{{ url('/admin/currencies') }}"><i class="fa fa-circle-o"></i> Currencies</a></li>
          </ul>
        </li>
        
        
        <li>
          <a href="{{ url('/admin/seasons') }}">
            <i class="fa fa-circle-o" aria-hidden="true"></i> <span>Seasons</span>                    
          </a>
        </li>
        
        
        <li>
          <a href="{{ url('/admin/vehicles') }}">
            <i class="fa fa-car" aria-hidden="true"></i> <span>Vehicles</span>                    
          </a>
        </li>
        
        
        <li class="hidden">
          <a href="{{ url('/admin/booking-orders') }}">
            <i class="fa fa-first-order" aria-hidden="true"></i> <span>Orders</span>                    
          </a>
        </li>
        
        <li class="hidden">
          <a href="{{ url('/admin/camper-pages') }}">
            <i class="fa fa-pagelines" aria-hidden="true"></i> <span>CMS Pages</span>                    
          </a>
        </li>
        
        
        
        
        
        <li style="display:none">
          <a href="{{ url('/admin/change-password') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Change Password</span>                    
          </a>
        </li>
        
        <li>
          <a href="{{ url('admin/logout') }}">
            <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>  
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>