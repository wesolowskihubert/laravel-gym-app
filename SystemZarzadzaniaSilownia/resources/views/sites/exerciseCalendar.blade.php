<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.Exercise - system zarządzania siłownią</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">

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
            <a href="home" class="nav-link">Strona domowa</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="contact" class="nav-link">Kontakt</a>
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
                    <a href="exerciseCalendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Kalendarz<span class="badge badge-info right"></span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="mail" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                        <p>Wiadomości</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile" class="nav-link">
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kalendarz</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Zajęcia</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Yoga</div>
                    <div class="external-event bg-warning">Zajecia z trenerem</div>
                    <div class="external-event bg-info">Zumba</div>
                    <div class="external-event bg-primary">Zajecia rozciagajace</div>
                    <div class="external-event bg-danger">Aerobik</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        Usuń po upuszczeniu
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Dodaj własne zajęcia</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Nazwa zajęć">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Dodaj</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src='../plugins/fullcalendar/locales/pl.js'></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });
    var events = @json($events);
    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: events,
      locale: 'pl',
      eventTimeFormat: { // like '14:30:00'
        hour: '2-digit',
        minute: '2-digit',
        meridiem: false
        },
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      },
      eventDidMount:function(event){
          console.log("eventRender :",event);
          let self = event;
          event.el.addEventListener('dblclick',function(){
            Swal.fire({
                title: 'Czy chcesz usunąć ten trening?',
                text: "Nie da sie tego cofnąć!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Tak, usuwam wydarzenie!',
                cancelButtonText: 'Nie, anuluj!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (value) {
              console.log(value);
              if(value.isConfirmed) {
                $.ajax({
                    url: '{{url("delete-events")}}/'+self.event.id,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: 'json',
                    success: function(dataResult) {
                        window.location.reload();
                    }
                });
              }
            });
        });
      },
        eventDrop: function(info) {
            var eventData = {
                id: info.event.id,
                title: info.event.title,
                start: info.event.start ? moment(info.event.start).format("YYYY-MM-DD HH:mm") : info.event.start,
                end: info.event.end ? moment(info.event.end).format("YYYY-MM-DD HH:mm") : info.event.end,
                _token: "{{ csrf_token() }}"
            };
            console.log(eventData);
            $.ajax({
                type: "POST",
                url: "{{ url('manage-events') }}",
                data:eventData,
                success: function(response){
                    toastr.success('Trening zakutalizowany')
                }
            });
        },
        eventReceive: function( info ) {
            console.log(info);
            //get the bits of data we want to send into a simple object
            var eventData = {
                title: info.event.title,
                start: info.event.start ? moment(info.event.start).format("YYYY-MM-DD HH:mm") : info.event.start,
                end: info.event.end ? moment(info.event.end).format("YYYY-MM-DD HH:mm") : info.event.end,
                _token: "{{ csrf_token() }}"
            };
            console.log(eventData);
            $.ajax({
                type: "POST",
                url: "{{ url('manage-events') }}",
                data:eventData,
                success: function(response){
                    toastr.success('Trening dodany prawidłowo')
                }
            });
        }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
