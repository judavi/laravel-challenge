<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>403 - Access denied</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style(asset('css/bootstrap.min.css')) }}
    {{ HTML::style(asset('css/errors.css')) }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        {{ HTML::script(url("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js")) }}
        {{ HTML::script(url("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")) }}
    <![endif]-->
  </head>

    <body class="error 404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>Oops!</h1>
                        <h2>Error 403</h2>
                        <div class="error-details">
                            <p>Sorry, {{ $message }}</p>
                        </div>
                        <div class="error-actions">
                            <a href="{{ route('index') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                Go to home </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact to support </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        {{ HTML::script(asset("js/jquery.min.js")) }}
        {{ HTML::script(asset("js/bootstrap.min.js")) }}
    </body>
</html>