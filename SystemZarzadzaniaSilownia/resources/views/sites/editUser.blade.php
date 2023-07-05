<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.Exercise - system zarządzania siłownią</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="\plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="\plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="\plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="\plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="\dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="\plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="\plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="\plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../home" class="nav-link">Strona domowa</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../contact" class="nav-link">Kontakt</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" role="button">
                <p>Wyloguj się</p>
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" style="padding:1rem;" class="brand-link">
        <span  class="brand-text font-weight-light font-weight-bold" >Exercise</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            @if(Auth::user()->image)
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">
            @endif
                <a href="#" style="display:inline-block !important;" class="d-block"> {{ Auth::user()->name }} {{ Auth::user()->surname }}  </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="../../home" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Panel główny
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                        <p> Użytkownicy<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../../users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zarządzaj uzytkownikami</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="../../addowner" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dodaj użytkownika</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../trainers" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trenerzy</p>
                    </a>
                </li>
            </ul>
         </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Płatności
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../order_history_all" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historia operacji</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../order_history" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Twoje zamówienia</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-heartbeat"></i>
              <p>
                Status zdrowia
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../../bmi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kalkulator BMI</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../kcal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kalkulator kalorii</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
              <p>
                Karnety
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../../membership" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Przegląd karnetów</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../addkarnet" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dodaj karnet</p>
                </a>
              </li>
            </ul>
          </li>
                <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                Zestawy ćwiczeń
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Podgląd zestawów</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dodaj zestaw</p>
                </a>
              </li>
            </ul>
          </li>
                <li class="nav-item">
                    <a href="../../exerciseCalendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Kalendarz<span class="badge badge-info right"></span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../mail" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                        <p>Wiadomości</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../profile" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Ustawienia</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Wyloguj</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="card-header">
            <h3 class="card-title">Edytuj uzytkownika</h3>
        </div>
        <form action="/user-update/{{$users->id}}" method="POST">
        @method('PUT')
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Imię</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$users->name}}" required placeholder="Wprowadź imię">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwisko</label>
                    <input type="text" name="surname" class="form-control" id="surname" value="{{$users->surname}}" required placeholder="Wprowadź nazwisko">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text"  name="email" class="form-control" id="email" value="{{$users->email}}" required placeholder="Wprowadź emial">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Numer telefonu</label>
                    <input type="number" name="phone_number" class="form-control" id="phone_number" value="{{$users->phone_number}}" required placeholder="Wprowadź numer telefonu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data urodzenia</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{$users->birth_date}}" required placeholder="Wprowadź date urodzenia">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adres zamieszkania</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{$users->address}}" required placeholder="Wprowadź adress">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hasło</label>
                    <input type="password" name="password" class="form-control" id="password"  placeholder="Wprowadź hasło">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> Powtórz hasło</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"   placeholder="Powtórz hasło">
                </div>
                <div class="form-group">
                <label for="account_type"> Wybierz typ konta</label>
                </div>
                <div class="form-group">
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input type="radio" name="account_type" class="form-check-input" id="account_type" value="Właściciel" required><label class="form-check-label">Właściciel</label></div>
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input  type="radio" name="account_type" class="form-check-input" id="account_type" value="Trener"><label class="form-check-label">Trener</label></div>
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input type="radio" name="account_type" class="form-check-input" id="account_type" checked="checked" value="Karnetowicz"><label class="form-check-label">Karnetowicz</label></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edytuj użytkownika</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Exercise - system zarządzani siłownią &copy; 2021 </strong>

    <div class="float-right d-none d-sm-inline-block">
        <b>Praca inżynierska</b> 2022
    </div>
</footer>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="\plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="\plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<script src="\plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="\plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="\plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="\plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="\plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="\plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="\plugins/moment/moment.min.js"></script>
<script src="\plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="\plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="\plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="\plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="\dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="\dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="\dist/js/pages/dashboard.js"></script>
</body>
</html>
