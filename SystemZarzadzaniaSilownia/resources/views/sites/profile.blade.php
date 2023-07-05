@include('adminLte/templateTop')

<div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header ">
              <label for="exampleInputEmail1">Zmień adres</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeAddress" method="POST">
                @csrf
                <input type="text" name="newAddres" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź nowy adres">
                <div class="mt-3">
                    <button type="submit" class=" btn-primary w-100 btn active" role="button" aria-pressed="true">Zmień adres</button>
                </div>
            </form>
        </div>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Numer telefonu</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changePhoneNumber" method="POST">
                @csrf
                <input type="number" name="newPhoneNumber" class="form-control" id="number" placeholder="Wprowadź nowy numer telefonu">
                <div class="mt-3">
                    <button type="submit" class=" btn-primary w-100 btn active" role="button" aria-pressed="true">Zmień numer telefonu</button>
                </div>
            </form>
        </div>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
              <label for="newPassword">Zmień hasło</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changePassword" method="POST">
                @csrf

                <input type="password" name="newPassword" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź nowe hasło">
                <div class="mt-3">
                    <button type="submit" class=" btn-primary btn w-100 active" role="button" aria-pressed="true">Zmień hasło</button>
                </div>
            </form>
        </div>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
              <label for="image"> Zaktualizuj zdjęcie</label>
              </div>
              <div class="card-body">
              <div class="form-group">
                    <form action="/user-upload-image" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" type="file" name="image">
                        <div class="mt-3">
                        <button class=" btn-primary btn w-100 active" role="button" aria-pressed="true" type="submit"> Zaktualizuj zdjęcie</button>
                        </div>
                    </form>
                </div>
              </div>
              </div>
              <div class="card card-red card-outline">
              <div class="card-header">
              <label for="newPassword">Usuń konto</label> <u>(nie wymaga potwierdzenia, opercji nie da sie odwrócić a jeśli masz aktywny karet - przepadnie!!!)</u>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="deleteAccount" method="POST">
                @csrf
                <div >
                    <button type="submit" class=" btn-danger w-100 btn active " role="button" aria-pressed="true">Usuń konto</button>
                </div>
            </form>
        </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
          @if (Auth::user()->account_type=="Właściciel")
          <div class="card card-green card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Zmień nazwe siłowni</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeGymName" method="POST">
                @csrf
                <input type="text" name="newNameGym" class="form-control" id="number" placeholder="Wprowadź nowa nazwe">
                <div class="mt-3">
                    <button type="submit" class=" btn-success w-100 btn active" role="button" aria-pressed="true">Zmień nazwe siłowni</button>
                </div>
            </form>
         </div>
              </div>
            </div>

            <div class="card card-green card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Zmień address placówki</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeGymAddress" method="POST">
                @csrf
                <input type="text" name="newAddressGym" class="form-control" id="number" placeholder="Wprowadź nowy address siłowni">
                <div class="mt-3">
                    <button type="submit" class=" btn-success w-100 btn active" role="button" aria-pressed="true">Zmień address placówki</button>
                </div>
            </form>
        </div>
              </div>
            </div>

            <div class="card card-green card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Zmień numer kontaktowy</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeGymPhoneNumber" method="POST">
                @csrf
                <input type="number" name="newPhoneGym" class="form-control" id="number" placeholder="Wprowadź nowy numer telefonu">
                <div class="mt-3">
                    <button type="submit" class=" btn-success w-100 btn active" role="button" aria-pressed="true">Zmień numer telefonu</button>
                </div>
            </form>
        </div>
              </div>
            </div>

            <div class="card card-green card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Zmień email kontaktowy</label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeGymEmail" method="POST">
                @csrf
                <input type="email" name="newEmailGym" class="form-control" id="number" placeholder="Wprowadź nowy numer telefonu">
                <div class="mt-3">
                    <button type="submit" class="btn-success w-100 btn active" role="button" aria-pressed="true">Zmień email kontaktowy</button>
                </div>
            </form>
        </div>
              </div>
            </div>
            <div class="card card-green card-outline">
              <div class="card-header">
              <label for="exampleInputEmail1">Zmień NIP </label>
              </div>
              <div class="card-body">
              <div class="form-group">
            <form action="changeNip" method="POST">
                @csrf
                <input type="number" name="newNIP" class="form-control" id="number" placeholder="Wprowadź nowy numer NIP">
                <div class="mt-3">
                    <button type="submit" class=" btn-success w-100 btn active" role="button" aria-pressed="true">Zmień NIP</button>
                </div>
            </form>
        </div>
              </div>
              @endif
            </div>
          <!-- /.col-md-6 -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </div>
@include('adminLte/templateBottom')
