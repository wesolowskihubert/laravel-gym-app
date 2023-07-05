@include('adminLte/templateTop')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Twój wskaźnik <b>BMI</b> wynosi <b>{{$bmi}}</b></h5>
                </div>
                <div class="card-body">
                <h5 class="card-title">Twoje BMI wskazuje na: <b>{{$przedzial}}</b></h5>
                </div>
            <div class="card-body">
              <p class="calculator-info__title">Zakresy wartości BMI:</p>
              <ul class="calculator-info__list">
                <li>mniej niż 16 - wygłodzenie</li>
                <li>16 - 16.99 - wychudzenie</li>
                <li>17 - 18.49 - niedowaga</li>
                <li>18.5 - 24.99 - wartość prawidłowa</li>
                <li>25 - 29.99 - nadwaga</li>
                <li>30 - 34.99 - I stopień otyłości</li>
                <li>35 - 39.99 - II stopień otyłości</li>
                <li>powyżej 40 - otyłość skrajna</li>
              </ul>
            </div>
            <div class="card-body">
              <p class="calculator-info__title">Klasyfikacja badanych według wartości wskaźnika masy ciała BMI z 2019 roku:</p>

              <div class="card card-danger">
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="461" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <span><em>Komunikat z badań: Czy Polacy mają problem z otyłością, CBOS, Nr 103/2019</em></span>
            </div>
          </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-green card-outline">
                <h5 class="m-0">Kalkulator BMI</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Kalkulator BMI (Body Mass Index) daje każdemu możliwość szybkiego i wygodego obliczenia własnego wskaźnika masy ciała. BMI obliczamy dzieląc masę ciała (w kilogramach) przez wzrost do kwadratu (w metrach). Wskaźnik ten wykorzystywany jest przede wszystkim do oceny ryzyka pojawienia się groźnych chorób: miażdżycy, choroby niedokrwiennej serca, udaru mózgu, czy nawet nowotworów. Większość tych chorób jest związana z otyłością i dlatego kalkulator BMI to tak przydatne narzędzie.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-blue card-outline">
                <h5 class="m-0">Czym jest BMI?</h5>
              </div>
              <div class="card-body card-outline">
                <p class="card-text">BMI jest jednym z ważnych wskaźniów określających nasz stan fizyczny, ale niestety nie wystarczającym. Bardzo ważnym uzupełnieniem BMI jest wskaźnik ilości tłuszczu brzusznego - zbyt duży może oznaczać niebezpieczną otyłość brzuszną i to nawet przy prawidłowym BMI! Ponadto, paradoksalnie, badania naukowe wskazują, że osoby z lekką nadwagą zwykle są zdrowsze i żyją dłużej od osób z tzw. "prawidłową wagą". Pojawiają się nawet głosy, że ustalony arbitralnie przez WHO próg nadwagi (25) jest zbyt niski.</p>
              </div>
            </div>
            <div class="card card-red card-outline">
              <div class="card-header">
                <h5 class="m-0">Pamiętaj !!!</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Kalkulator BMI obrazuje przybliżoną zawartość tłuszczu w organiźmie. W przypadku niektórych osób wskaźnik BMI może sugerować błędne wnioski. Osoby aktywne fizycznie, uprawiający sport, mogą posiadać zawyżoną wagę związaną z tkanką mięśniową a nie z ilością tłuszczu w organiźmie. Ponadto nie zaleca się stosowania wskaźnika BMI do oznaczania wagi ciała dla dzieci do ok. 14 roku życia oraz dla kobiet w ciąży.</p>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Niedowaga %',
          'Prawidłowa masa ciała %',
          'Nadwaga %',
          'Otyłość %',
      ],
      datasets: [
        {
          data: [2,39,38,21],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef',],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>

@include('adminLte/templateBottom')
