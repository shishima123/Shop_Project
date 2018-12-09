
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/category">
          <i class="fas fa-fw fa-table"></i>
          <span>Category</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/product">
          <i class="fas fa-fw fa-table"></i>
          <span>Product</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin/comment">
          <i class="fas fa-fw fa-table"></i>
          <span>Comment</span></a>
      </li>
    </ul>
    @yield('content')
  </div>
