@include('adminLte/templateTop')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Oblicz swój wskaźnik <b>BMI</b></h5>
                </div>
                <form action="calculate_bmi" method="POST">
                @csrf
                <div class="card-body">
                <label for="plec">Płeć:</label>
                    <div class="form-group">
                        <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input checked="checked" type="radio" name="plec" class="form-check-input" id="plec" value="Kobieta" required><label class="form-check-label">Kobieta</label></div>
                        <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input  type="radio" name="plec" class="form-check-input" id="plec" value="Mężczyzna"><label class="form-check-label">Mężczyzna</label></div>
                    </div>
                  <div class="form-group">
                  <label for="waga">Masa ciała:</label>
                    <input type="number" class="form-control" name="waga" id="waga" placeholder="Podaj wage w kg">
                  </div>
                  <div class="form-group">
                    <label for="wzrost">Wzrost: </label>
                    <input type="number" class="form-control" name="wzrost" id="wzrost" placeholder="Podaj wzrost w cm">
                  </div>
                 </div>
                <div style="padding-left:1.25rem">
                  <button type="submit" class="btn btn-primary">Oblicz</button>
                </div>
                </form>

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
              <div class="card-body">
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
@include('adminLte/templateBottom')
