<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Readme |
        @section('page_title')
          @show
    </title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style(asset('css/bootstrap.css')) }}
    {{ HTML::style(asset('css/bootstrap-theme.min.css')) }}
    {{ HTML::style(asset('assets/fontawesome/css/font-awesome.min.css')) }}

    <!-- Needed core CSS -->
    @section('styles')
      @show

  </head>

  <body style="padding-top: 60px;">
    <div class="navbar navbar-inverse navbar-fixed-top">
      @include('layouts.top-nav')
    </div>
    <main id="main-content-wrapper" class="container">
      <section id="main-content" class="row">
        <div class="inner col-md-12">
          @yield('content')
        </div>
      </section>
    </main>
    <footer id="footer" class="container" style="margin-top: 45px;">
      <div class="inner row">
        <div class="col-md-12">
          <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
          <button id="backto-top" class="btn btn-primary btn-xs">Back to top</button>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    {{ HTML::script(asset('js/jquery.min.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('js/bootstrap.min.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('assets/jquery-validation/dist/jquery.validate.min.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('assets/jquery-validation/dist/additional-methods.min.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('assets/bootbox/bootbox.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('js/ui.form.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('js/ui.modal.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('js/ui.buttons.js'), array('type' => 'text/javascript')) }}
    {{ HTML::script(asset('js/form.components.js'), array('type' => 'text/javascript')) }}
    @section('scripts')
      @show
  </body>
</html>