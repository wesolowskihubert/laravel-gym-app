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
              @if (Auth::user()->account_type=="Właściciel")
              <li class="nav-item">
                <a href="../../users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zarządzaj uzytkownikami</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->account_type!="Karnetowicz")
                <li class="nav-item">
                    <a href="../../addowner" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dodaj użytkownika</p>
                    </a>
                </li>
              @endif
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
                        @if (Auth::user()->account_type=="Właściciel")
                        <li class="nav-item">
                            <a href="../../order_history_all" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historia operacji</p>
                            </a>
                        </li>
                        @endif
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
              @if (Auth::user()->account_type!="Karnetowicz")
              <li class="nav-item">
                <a href="../../addkarnet" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dodaj karnet</p>
                </a>
              </li>
              @endif
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

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Exercise
                    <small class="float-right">Data faktury: {{$orders[0]->dataz}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Od:
                  <address>
                    <strong>{{$gym[0]->nazwa_silowni}}</strong><br>
                    {{$gym[0]->address}}<br>
                    NIP: {{$gym[0]->nip}}<br>
                    Tel: {{$gym[0]->phone}}<br>
                    Email: {{$gym[0]->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Do:
                  <address>
                    <strong>{{$orders[0]->klient}}</strong><br>
                    {{$orders[0]->klient_address}}<br>
                    {{$orders[0]->klient_phone}}<br>
                    {{$orders[0]->klient_email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Faktura ID</b><br>
                  <br>
                  <b>Numer zamówienia:</b> {{$orders[0]->id}}<br>
                  <b>Data płatności<cite></cite>:</b> {{$orders[0]->data_zakupu}}<br>
                  <b>Forma płatności:</b> PayPal
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Ilość</th>
                      <th>Nazwa produkt</th>
                      <th>Typ produktu</th>
                      <th>Opis</th>
                      <th>Cena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1 x </td>
                      <td>{{$orders[0]->nazwa_karnetu}}</td>
                      <td>{{$orders[0]->order_type}}</td>
                      <td>@if ($orders[0]->order_type=="Karnet")
                      Zakup karnetu umożliwiającego wstęp na siłownie
                      @else
                      Zakup zestawu ćwiczeń na siłownie
                      @endif
                      </td>
                      <td>{{$orders[0]->cena}} PLN</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metody płatności:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Dziękujemy za zakupy,<br> cieszymy się ogormnie że to co tworzymy stało przybliża cie do realizacji twoich założeń.<br><br> Zespół Exercise wraz z trenerami.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Data {{($orders[0]->data_zakupu)}}</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody><tr>
                        <th style="width:50%">Cena:</th>
                        <td>{{($orders[0]->cena)*0.77}} PLN</td>
                      </tr>
                      <tr>
                        <th>Podatek (23%)</th>
                        <td>{{($orders[0]->cena)*0.23}} PLN</td>
                      </tr>
                      <tr>
                        <th>Wysyłka:</th>
                        <td>0 PLN</td>
                      </tr>
                      <tr>
                        <th>Cena całkowita:</th>
                        <td>{{$orders[0]->cena}} PLN</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-primary float-right"  onclick="window.print();"  style="margin-right: 5px;">
                    <i class="fas fa-print"></i> Drukuj
                  </button>

                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Wygeneruj PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer no-print">
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
