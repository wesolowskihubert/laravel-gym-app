@include('adminLte.templateTop')
<div class="ml-5 mr-5">
<section class="content">

<div class="card">
<div class="card-body row">
<div class="col-5 text-center d-flex align-items-center justify-content-center">
<div class="">
@foreach($gyms as $gym)
<h2><strong>{{$gym->nazwa_silowni}}</strong></h2>
<p class="lead mb-5">{{$gym->address}}<br>
{{$gym->email}}<br>
{{$gym->phone}}
@endforeach
</div>
</div>
<div class="col-7">
<div class="form-group">
<label for="inputName">Imie</label>
<input type="text" id="inputName" class="form-control">
</div>
<div class="form-group">
<label for="inputEmail">E-Mail</label>
<input type="email" id="inputEmail" class="form-control">
</div>
<div class="form-group">
<label for="inputSubject">Temat</label>
<input type="text" id="inputSubject" class="form-control">
</div>
<div class="form-group">
<label for="inputMessage">Treść wiadomości</label>
<textarea id="inputMessage" class="form-control" rows="4"></textarea>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Wyślij wiadomość">
</div>
</div>
</div>
</div>
</section>
</div>

@include('adminLte.templateBottom')
