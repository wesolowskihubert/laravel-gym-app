@include('adminLte.templateTop')

<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Wszyscy uzytkownicy</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr style="text-align: center;">
                      <th>ID</th>
                      <th>Imie</th>
                      <th>Nazwisko</th>
                      <th>Address</th>
                      <th>Typ Konta</th>
                      <th>Edytuj</th>
                      <th>Usuń</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($allUsers as $allUser)
                    <tr style="text-align: center;">
                      <td>{{$allUser->id}}</td>
                      <td>{{$allUser->name}}</td>
                      <td>{{$allUser->surname}}</td>
                      <td>{{$allUser->address}}</td>
                      <td>{{$allUser->account_type}}</td>
                      <td><a href="/user-edit/{{$allUser->id}}"><i style="color:lightgreen" class="fas fa-edit"></i></a></td>
                      <td><button type="button" data-toggle="modal" data-target="#exampleModalCenter{{$allUser->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Usuń</button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

<!-- Modal -->
@foreach ($allUsers as $allUser)
<div class="modal fade" id="exampleModalCenter{{$allUser->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Usuń użytkownika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Czy na pewno chcesz usunać tego użytkownika ID:{{$allUser->id}}?
      </div>
      <form action="/user-delete/{{$allUser->id}}" method="POST">
      @method('DELETE')
      @csrf
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="sumit" class="btn btn-primary">Potwierdź</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
              <!-- /.card-body -->
            </div>
            {{$allUsers->links()}}
            <!-- /.card -->
          </div>
        </div>
    </div>
</div>

@include('adminLte.templateBottom')
