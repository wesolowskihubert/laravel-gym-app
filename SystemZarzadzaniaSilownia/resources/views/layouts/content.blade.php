<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @if (Auth::user()->account_type=="Właściciel")
            <div class="col-lg-3 col-6">
                <!-- balance box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Liczba aktywnych karnetów</p>
                        <h3>{{App\Http\Controllers\HomeController::activeMemberships();}}</h3>
                    </div>
                    <a  class="small-box-footer">&nbsp;</a>
                </div>
            </div>
            @endif
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Liczba wszystkich użytkowników</p>
                        <h3>{{DB::table('users')->select('id')->count();}}</h3>
                    </div>
                    <a class="small-box-footer"> &nbsp;</a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" style="color: white !important;">
                    <div class="inner">
                        <p>Rodzaj konta</p>
                        <h3>{{Auth::user()->account_type}}</h3>
                    </div>
                    <a  class="small-box-footer" style="color: white !important;">&nbsp;</a>
                </div>
            </div>
               <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
                <div class="small-box bg-danger" style="color: white !important;">
                    <div class="inner">
                        <p>Licza planów treningowych</p>
                        <h3>{{DB::table('exercises')->select('id')->count();}}</h3>
                    </div>
                    <a  class="small-box-footer" style="color: white !important;">&nbsp;</a>
                </div>
            </div>
        </div>
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            @if (Auth::user()->account_type=="Właściciel")
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Wykres sprzedaży za rok {{\Carbon\Carbon::now()->year}}
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card card-success">
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 424px;" width="424" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            @endif
            <!-- /.card -->
            <div id="direct-chat-id" class="card direct-chat">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Czat</h3>
                <div class="card-tools">
                  <span title="New Messages" class="badge badge-primary"></span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                 <!-- <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i> -->
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div id="masne_id" class="card-body">
                <!-- Conversations are loaded here -->
                <div id="direct-chat-primary" class="direct-chat-messages">
            @include('layouts/chat')
            </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form id="SubmitForm">
                @csrf
                  <div class="input-group">
                    <input type="text" name="sMessage" id="sMessage" placeholder="Napisz wiadomość ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Wyślij</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            <script>
            document.getElementById("direct-chat-primary").addEventListener('scroll', function() {  elmnt = document.getElementById("direct-chat-primary");
                                wysokosc = elmnt.scrollTop;
                                });
            document.getElementById("direct-chat-primary").scrollTop=wysokosc;
            </script>
            </div>
            <script>
                document.getElementById("direct-chat-primary").scrollTop = document.getElementById("direct-chat-primary").scrollHeight;
                var elmnt;
                var  wysokosc;
                let autofresh = setInterval(() => {
                  $('#direct-chat-primary').load("<?php echo url('chat'); ?>");
                }, 2000);
             </script>
            <!-- TO DO List -->
            @if (Auth::user()->account_type!="Karnetowicz")
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Lista zadań do zrobienia
                </h3>
              <div class="card-tools">
                 <!--  <ul class="pagination pagination-sm">
                       <li class="page-item"><a href="#" class="page-link">«</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">»</a></li>
                  </ul>  -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Zadzwoń do klientki</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 15 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Skontaktuj sie z firmą dietetyczną</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 godz</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Sporzadź podsumowanie za poprzedni tydzień</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 dzień</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Aktualizuj ceny karnetów</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 dni</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Przesuń zajęcia z YOGI</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 tyg</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Zatrudnij nowego trenera</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 mies</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <!-- <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>-->
              </div>
            </div>
            <!-- /.card -->
            @endif
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <section class="col-lg-5 connectedSortable ui-sortable">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Nowi członkowie</h3>
                    <div class="card-tools">
                      <span class="badge badge-danger">8 Ostanio zarejsetowanych użytkowników</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    @foreach ($newUsers->take(8) as $newUser)
                    <li>
                        <img src="{{asset('/storage/images/'.$newUser->image)}}" alt="User Image">
                        <a class="users-list-name" href="#">{{$newUser->name}} {{$newUser->surname}}</a>
                        <span class="users-list-date">{{App\Http\Controllers\HomeController::formatDate($newUser->created_at)}}</span>
                    </li>
                    @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/users">Zobacz wszystkich użytkowników</a>
                  </div>
                  <!-- /.card-footer -->
                </div>

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Polecane zestawy ćwiczeń</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @php
                $e_list=DB::table('exercises')->select('id')->count();
                if($e_list>5){
                    $e_list=5;
                }
                @endphp
                  @for($i=1;$i<=$e_list;$i=$i+1)
                    <!-- /.item -->
                    <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{DB::table('exercises')->select('nazwa_zestawu')->where('id', $i)->limit(5)->value('nazwa_zestawu');}}
                        <span class="badge badge-success float-right">{{DB::table('exercises')->select('cena')->where('id', $i)->limit(5)->value('cena');}} PLN</span></a>
                      <span class="product-description">
                      {{DB::table('exercises')->select('opis')->where('id', $i)->limit(5)->value('opis');}}
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  @endfor
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Zobacz wszystkie zestawy ćwiczeń</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
        </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var year = <?php echo $year; ?>;
    var user = <?php echo $user; ?>;
    var zestawy = <?php echo $zestawy; ?>;
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData ={
      labels  : ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Paźzdziernik', 'Listopad', 'Grudzień'],
      datasets: [
        {
          label               : 'Karnety',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                :  user
        },
        {
          label               : 'Zestawy Ćwiczeń',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                :  zestawy
        },
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>
<script>
$("#SubmitForm").submit( function (e) {
            e.preventDefault();
            let wiadomosc = $('#sMessage').val();
            $.ajax({
                method:"POST",
                url:"/sendMessage",
                data: {
                    "_token": "{{ csrf_token() }}",
                    wiadomosc:wiadomosc,
                },
                success: function (response){
                    console.log(response);
                },
            });
            $("#SubmitForm")[0].reset();
          });
</script>
