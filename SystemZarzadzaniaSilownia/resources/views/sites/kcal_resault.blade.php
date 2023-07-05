@include('adminLte/templateTop')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Twoje dzienne <b>zapotrzebowanie kaloryczne</b> wynosi <b>{{round($kcal)}} kcal</b></h5>
                </div>
            <div class="card-body">
              <p class="calculator-info__title">Dostarcz organizmowi:</p>
              <ul class="calculator-info__list">
                <li>15% <b>białka: </b>{{round($kcal*0.15)}} kcal = {{round(($kcal*0.15)/4)}} g</li>
                <li>55% <b>węglowodanów: </b>{{round($kcal*0.55)}} kcal = {{round(($kcal*0.55)/4)}} g</li>
                <li>30% <b>tłuszczu: </b>{{round($kcal*0.3)}} kcal = {{round(($kcal*0.3)/9)}} g</li>
              </ul>
            </div>
            <div class="card-body">
              <p class="calculator-info__title">Podział makroskładników (g):</p>
              <div class="card card-danger">
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="461" height="250" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <span><em>Są to orientacyjne wyliczenia, które mogą różnić się u poszczególnych osób ze względu na indywidualne cechy i parametry dodatkowe.</em></span>
            </div>
          </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-blue card-outline">
                <h5 class="m-0">Kalkulator kalorii</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Kalkulator kalorii umożliwia szybkie i wygodne wyliczenie własnego dziennego zapotrzebowania na kalorie oraz poznanie wskaźnika BMR. Wskaźnik podstawowej przemiany materii (Basal Metabolic Rate, BMR) jest minimalnym dziennym zapotrzebowaniem energetycznym koniecznym do podtrzymania podstawowych procesów życiowych ciała w spoczynku.</p>
              </div>
            </div>
            <div class="card card-red card-outline">
              <div class="card-header">
                <h5 class="m-0">Pamiętaj !!!</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Każdy organizm jest inny! Podane przez kalkulator kalorii wartości mają charakter orientacyjny i pomocniczy. Żadne narzędzie nie zastąpi konsultacji ze specjalistą! Zamieszczone informacje nie mogą być podstawą do przeprowadzenia samodiagnozy czy leczenia.</p>
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
    var kcal = <?php echo $kcal; ?>;
    var bialko = Math.round((kcal*0.15)/4);
    var weglowodany = Math.round((kcal*0.55)/4);
    var tluszcze = Math.round((kcal*0.3)/9);
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Białko',
          'Węglowodany',
          'Tłuszcze',
      ],
      datasets: [
        {
          data: [bialko,weglowodany,tluszcze],
          backgroundColor : ['#00FFFF', '#0096FF', '#87CEEB'],
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
