@include('adminLte/templateTop')
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Oblicz swoje dzienne <b>zapotrzebowanie kaloryczne:</b></h5>
                </div>
                <form action="calculate_kcal" method="POST">
                @csrf
                <div class="card-body">
                <label for="plec">Płeć:</label>
                    <div class="form-group">
                        <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input checked="checked" type="radio" name="plec" class="form-check-input" id="plec" value="Kobieta" required><label class="form-check-label">Kobieta</label></div>
                        <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input  type="radio" name="plec" class="form-check-input" id="plec" value="Mężczyzna"><label class="form-check-label">Mężczyzna</label></div>
                    </div>
                  <div class="form-group">
                  <label for="wiek">Wiek:</label>
                    <input type="number" class="form-control" name="wiek" id="wiek" min="18" max="99" placeholder="Podaj wiek (19-99)">
                  </div>
                  <div class="form-group">
                  <label for="waga">Masa ciała:</label>
                    <input type="number" class="form-control" name="waga" id="waga" placeholder="Podaj wage w kg">
                  </div>
                  <div class="form-group">
                    <label for="wzrost">Wzrost: </label>
                    <input type="number" class="form-control" name="wzrost" id="wzrost" placeholder="Podaj wzrost w cm">
                  </div>
                  <div class="form-group">
                    <label for="activity">Poziom aktywności fizycznej: </label>
                    <select class="form-control input-select-std" name="activity">
                        <option value="0">Brak aktywności fizycznej</option>
                        <option value="1">Mała aktywność fizyczna (ćwiczenia 1-3 tygodniowo)</option>
                        <option value="2">Średnia aktyność fizyczna (ćwiczenia 3-5 tygodniowo)</option>
                        <option value="3">Duża aktywność fizyczna (ćwiczenia codziennie)</option>
                        <option value="4">Bardzo duża aktywność fizyczna</option>
                    </select>
                  </div>
                 </div>
                <div style="padding-left:1.25rem;padding-bottom:1.25rem">
                  <button type="submit" class="btn btn-primary">Oblicz</button>
                </div>
                </form>
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
@include('adminLte/templateBottom')
