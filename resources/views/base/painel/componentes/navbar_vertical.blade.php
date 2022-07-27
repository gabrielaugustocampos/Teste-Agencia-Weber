<ul class="shadowbox toggled collapse"></ul>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

  <hr class="sidebar-divider my-0"> 

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('/painel')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Início</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface e Conteúdo
  </div>
 
  <li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseCategoria" aria-expanded="false"
      aria-controls="collapseCategoria">
      <i class="fas fa-list"></i>
      <span>Categorias</span>
    </a>
    <div id="collapseCategoria" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{route('categorias.index')}}">Cadastrar</a>
        <a class="collapse-item" href="{{route('categorias.listar')}}">Listar</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('produtos')}}">
      <i class="fas fa-fw fa-folder"></i>
      <span>Produtos</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

