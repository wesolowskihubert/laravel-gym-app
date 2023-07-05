@include('adminLte/templateTop')
<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Twoje płatności</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Nazwa produktu</th>
                      <th>Cena</th>
                      <th>Data zakupu</th>
                      <th>Typ zamównienia</th>
                      <th>Podgląd</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($allOrders as $allOrder)
                    <tr style="text-align: center;">
                      <td>{{$allOrder->nazwa_karnetu}}</td>
                      <td>{{$allOrder->cena}}</td>
                      <td>{{$allOrder->data_zakupu}}</td>
                      <td>{{$allOrder->order_type}}</td>
                      <td><a href="/order-show/{{$allOrder->id}}">Podgląd</i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{$allOrders->links()}}
            <!-- /.card -->
          </div>
        </div>
    </div>
</div>
@include('adminLte/templateBottom')
