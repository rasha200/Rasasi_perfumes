  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      @if(Auth::user()->role == 'manager')
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{route('users.index')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      @endif


      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }} collapsed " href="{{route('categories.index')}}">
          <i class="bi bi-menu-button-wide"></i><span>Categories</span></i>
        </a>
      
      </li><!-- End Components Nav -->



      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('subCategories.index') ? 'active' : '' }} collapsed" href="{{route('subCategories.index')}}">
          <i class="bi bi-journal-text"></i><span>Sub Categories</span></i>
        </a>
    
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }} collapsed" href="{{route('products.index')}}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products</span></i>
        </a>
     
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('#') ? 'active' : '' }} collapsed" href="#">
          <i class="bi bi-bar-chart"></i><span>Orders</span></i>
        </a>
  
      </li><!-- End Charts Nav -->

      
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }} collapsed" href="/contacts">
          <i class="bi bi-envelope"></i>
          <span>Contact Us</span>
        </a>
      </li><!-- End Contact Page Nav -->

  
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('.index') ? 'active' : '' }} collapsed" href="">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('home')}}">
          <i class="bi bi-house-door"></i>
          <span>User side</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('contacts.index')}}">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    
      
    </ul>

  </aside><!-- End Sidebar-->
