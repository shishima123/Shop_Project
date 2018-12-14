<div class="container-fluid">
  <div class="row">
    <div class="col-2 navbar-nav Left-sidebar--Height">
      <!-- Sidebar -->
      <div class="nav-item ml-3 my-1">
        <a id="1" class="nav-link d-flex text-muted {{ Request::is('admin') ? 'Admin--LeftBar--Active' : '' }}" href="{{ asset('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt mt-1 mr-2"></i>
          <span>Dashboard</span>
        </a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="2" class="nav-link d-flex text-muted {{ Request::is('admin/user*') ? 'Admin--LeftBar--Active' : '' }}" href="{{ route('admin.user.index') }}">
          <i class="fas fa-users-cog mt-1 mr-2"></i>
          <span>User</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="3" class="nav-link d-flex text-muted {{ Request::is('admin/category*') ? 'Admin--LeftBar--Active' : '' }}" href="{{ asset('admin/category') }}">
          <i class="fas fa-fw fa-table mt-1 mr-2"></i>
          <span>Category</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="4" class="nav-link d-flex text-muted {{ Request::is('admin/product*') ? 'Admin--LeftBar--Active' : '' }}" href="{{ asset('admin/product') }}">
          <i class="fas fa-shopping-basket mt-1 mr-2"></i>
          <span>Product</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="5" class="nav-link d-flex text-muted {{ Request::is('admin/comment*') ? 'Admin--LeftBar--Active' : '' }}" href="{{ asset('admin/coment') }}">
          <i class="far fa-comment-alt mt-1 mr-2"></i>
          <span>Comment</span></a>
      </div>
    </div>
    <div class="col-10">
      @yield('content')
    </div>
  </div>
</div>