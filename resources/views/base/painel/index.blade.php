<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>

    @component('base.painel.componentes.meta')
    @endcomponent

    @component('base.painel.componentes.header')
    @endcomponent

  </head>
  <body id="page-top">

    @component('base.painel.componentes.loading')
    @endcomponent

    <div class="sidebar_mobile" style="background-color: #234bbf;">

      @component('base.painel.componentes.navbar_vertical')
      @endcomponent

    </div>

    <div id="wrapper">

      <div class="sidebar_desk" style="background-color: #234bbf;">

        @component('base.painel.componentes.navbar_vertical')
        @endcomponent

      </div>

      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">


          @component('base.painel.componentes.navbar_topo', ["user" => $user])
          @endcomponent

          @yield('content')

        </div>

        @component('base.painel.componentes.footer')
        @endcomponent

      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">

      <i class="fas fa-angle-up"></i>

    </a>

    @component('base.painel.componentes.scripts')
    @endcomponent

  </body>
</html>
