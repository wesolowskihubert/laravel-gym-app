@include('adminLte.templateTop')
<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wszystkie dostępne karnety</h3>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
                @if (App\Http\Controllers\MembershipController::showExpiryAlert())
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Uwaga, twój poprzedni karnet wygasł!</h5>
                  Twój karnet wygasł <b>{{App\Http\Controllers\MembershipController::showExpiredDate()}}</b>, zachęcamy do zakupu nowego.
                </div>
                @elseif (DB::table('active_memberships')->where('user_id', Auth::user()->id)->count()>0)
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Uwaga, wciąż masz aktywny karnet!</h5>
                  W tej chwili masz aktyny karnet do <b>{{App\Http\Controllers\MembershipController::showToday(0)}}</b>, jeśli kupisz następy data wygąsniecia zostanie automatycznie przedłużona.
                </div>
                @else
                @endif
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr style="text-align: center;">
                      <th>ID</th>
                      <th>Nazwa karnetu</th>
                      <th>Aktywny od</th>
                      <th>Wazny do</th>
                      <th>Cena</th>
                      <th>Zakup karnet</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($allMemberships as $allMembership)
                    <tr style="text-align: center;">
                      <td>{{$allMembership->id}}</td>
                      <td>{{$allMembership->nazwa_karnetu}}</td>
                      <td>{{App\Http\Controllers\MembershipController::showToday($allMembership->dni_karnetu)}}</td>
                      <td>{{App\Http\Controllers\MembershipController::showExpiry($allMembership->dni_karnetu)}}</td>
                      <td>{{$allMembership->cena}} PLN</td>
                      <td><div id="smart-button-container">
            <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://www.paypal.com/sdk/js?client-id=AUA1Gnd7D2Ukx4eyrDawJhCzdWe-IgmubXSYg1kB-8hH3UsoB9yw9m2nB-3i88EKro8hYB_nnni8K_8r&enable-funding=venmo&currency=PLN" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          label: 'paypal',

        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"PLN","value":{{$allMembership->cena}}}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

            // Full available details
            console.log(typeof orderData);

            orderData["exercise_user"]="{{Auth::user()->name}} {{Auth::user()->surname}}";
            orderData["przedmiot"]="{{$allMembership->nazwa_karnetu}}";
            orderData["karnet_expiry"]="{{App\Http\Controllers\MembershipController::showExpiry($allMembership->dni_karnetu)}}";
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            //console.log(orderData.exercise_user);
            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<p>Dziękujemy za zakup!</p>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
            });
            $.ajax({
                method:"POST",
                url:"/place-order",
                data:{
                    'przedmiot':orderData.przedmiot,
                    'cena':{{$allMembership->cena}},
                    'klient':orderData.exercise_user,
                    'karnet_expiry':orderData.karnet_expiry,
                },
                success: function (response){
                    console.log(response);
                },
            });
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script></td>
                    </tr>
                 @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{$allMemberships ->links()}}
            <!-- /.card -->
          </div>
        </div>
    </div>
</div>

@include('adminLte.templateBottom')
