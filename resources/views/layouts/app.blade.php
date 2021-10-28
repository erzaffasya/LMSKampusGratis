<!DOCTYPE html>
<html lang="en">

@include('partials.head')
@include('notify::components.notify')
@notifyCss
<body class="g-sidenav-show  bg-gray-100">

  <!-- sidebar -->
  @include('partials.sidebar')
  <!-- end sidebar -->

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

  <!-- Navbar -->
    @include('partials.navbar')
  <!-- End Navbar -->

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

  @if ($message = Session::get('edit'))
  <div class="alert alert-warning alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif

  @if ($message = Session::get('delete'))
  <div class="alert alert-danger alert-dismissible fade show col-5" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" style="color:white"><strong>{{$message}}</strong></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  <!-- container -->
    <div class="container-fluid py-4">      
      
       <!-- isi konten -->
        {{$slot}}
        @yield('content')

       <!-- end isi konten -->

      <!-- footer -->
        @include('partials.footer')
      <!-- end isi footer -->

    </div>
  <!-- end container -->


  </main>

  <div class="fixed-plugin">
    @include('partials.plugin')
  </div>
  

  @include('partials.scripts')
  @notifyJs
</body>

</html>