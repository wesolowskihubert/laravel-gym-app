@include('adminLte.templateTop')

<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="card-header">
            <h3 class="card-title">Dodaj nowego użytkownika</h3>
        </div>
        <form action="adduser" method="POST">
           @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Imię</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required placeholder="Wprowadź imię">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwisko</label>
                    <input type="text" name="surname" class="form-control" id="surname" value="{{old('surname')}}" required placeholder="Wprowadź nazwisko">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text"  name="email" class="form-control" id="email" value="{{old('email')}}" required placeholder="Wprowadź emial">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Numer telefonu</label>
                    <input type="number" name="phone_number" class="form-control" id="phone_number" value="{{old('phone_number')}}" required placeholder="Wprowadź numer telefonu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Data urodzenia</label>
                    <input type="date" name="birth_date" class="form-control" id="birth_date" value="{{old('birth_date')}}" required placeholder="Wprowadź date urodzenia">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adres zamieszkania</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}" required placeholder="Wprowadź adress">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hasło</label>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="Wprowadź hasło">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> Powtórz hasło</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"  required placeholder="Powtórz hasło">
                </div>
                <div class="form-group">
                <label for="account_type"> Wybierz typ konta</label>
                </div>
                <div class="form-group">
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input type="radio" name="account_type" class="form-check-input" id="account_type" value="Właściciel" required><label class="form-check-label">Właściciel</label></div>
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input  type="radio" name="account_type" class="form-check-input" id="account_type" value="Trener"><label class="form-check-label">Trener</label></div>
                   <div style="display: inline-block;padding-right: 1.25rem;" class="form-check"><input type="radio" name="account_type" class="form-check-input" id="account_type" checked="checked" value="Karnetowicz"><label class="form-check-label">Karnetowicz</label></div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
            </div>
        </form>
    </div>
</div>
@include('adminLte.templateBottom')
