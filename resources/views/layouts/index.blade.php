<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<nav class="navbar navbar-default navbar-ststic-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Paperfly</a>
    </div>
  </div>
</nav>
<div id="wrapper">
<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Menu
                    </a>
                </li>
                <li>
                    <a href="#">Division</a>
                </li>
                <li>
                    <a href="#">District</a>
                </li>
                <li>
                    <a href="#">Thana</a>
                </li>
                <li>
                    <a href="{{route('banks')}}">Bank</a>
                </li>
                <li>
                    <a href="{{route('bankBranch')}}">Bank Branch</a>
                </li>
                <li>
                    <a href="#">ATM Location</a>
                </li>
                <li>
                    <a href="#">Merchant</a>
                </li>
                <li>
                    <a href="#">Central Point</a>
                </li>
                 <li>
                    <a href="#">Outpost Location</a>
                </li>
                 <li>
                    <a href="#">Employee</a>
                </li>
            </ul>
        </div>

<div class="container">
  <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Sidebar! Click Me</a>
  @yield('content')
</div>
</div>
 
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>

@yield('js')
</body>
</html>
