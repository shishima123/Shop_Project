<div class="container-fluid">
  <div class="row">
    <div class="col-2 navbar-nav Left-sidebar--Height">
      <!-- Sidebar -->
      <div class="nav-item ml-3 my-1">
        <a id="1" class="nav-link d-flex text-muted {{ Request::is('admin') ? 'active' : '' }}" href="{{ asset('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt mt-1 mr-2"></i>
          <span>Dashboard</span>
        </a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="2" class="nav-link d-flex text-muted {{ Request::is('admin/user*') ? 'active' : '' }}" href="{{ route('admin.user.index') }}">
          <i class="fas fa-users-cog mt-1 mr-2"></i>
          <span>User</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="3" class="nav-link d-flex text-muted {{ Request::is('admin/category*') ? 'active' : '' }}" href="{{ asset('admin/category') }}">
          <i class="fas fa-fw fa-table mt-1 mr-2"></i>
          <span>Category</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="4" class="nav-link d-flex text-muted {{ Request::is('admin/product*') ? 'active' : '' }}" href="{{ asset('admin/product') }}">
          <i class="fas fa-shopping-basket mt-1 mr-2"></i>
          <span>Product</span></a>
      </div>

      <div class="nav-item ml-3 my-1">
        <a id="5" class="nav-link d-flex text-muted {{ Request::is('admin/comment*') ? 'active' : '' }}" href="{{ asset('admin/coment') }}">
          <i class="far fa-comment-alt mt-1 mr-2"></i>
          <span>Comment</span></a>
      </div>
    </div>
    <div class="col-10">
      @yield('content')
    </div>
  </div>
</div>