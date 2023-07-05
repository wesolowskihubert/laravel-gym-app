@include('adminLte/templateTop')
<div class="content">
      <div class="container-fluid">
      <div class="card-body">
         <h2 class="card-title"><b>Dostępni trenerzy personalni: </b></h2>
      </div>
      <div class="row">
          @foreach ( $allTrainers as $allTrainer)
          <!-- /.col -->
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div style="background-color:{{'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);}} !important" class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{$allTrainer->name}} {{$allTrainer->surname}}</h3>
                <h5 class="widget-user-desc">Trener Certyfikowany</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{asset('/storage/images/'.$allTrainer->image)}}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">E-mail</h5>
                      <span class="description-text">{{$allTrainer->email}} </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"> Telefon </h5>
                      <span class="description-text">{{$allTrainer->phone_number}} </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">

                      @if (DB::table('ratings')->select('id')->where('oceniajacy_id', Auth::user()->id)->where('trainer_id', $allTrainer->id)->count()>0)
                      <div class="description-block">
                        <h5 class="description-header">Średnia ocen</h5>
                      {{round(DB::table('ratings')->where('trainer_id', $allTrainer->id)->avg('rating'),2)}} ⭐
                      @else
                      <div class="description-block">
                        <h5 class="description-header">Zostaw ocene</h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$allTrainer->id}}">Oceń trenera</button>
                      @endif
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
          @endforeach
        </div>
        @foreach ( $allTrainers as $allTrainer)
        <div class="modal fade" id="exampleModalCenter{{$allTrainer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Oceń trenera  {{$allTrainer->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/add-rating/{{$allTrainer->id}}" method="POST">
      @method('POST')
      @csrf
      <div class="modal-body">
      <div class="rating-css">
    <div class="star-icon">
        <input type="radio" value="1" name="trainer_rating" checked id="rating1{{$allTrainer->id}}">
        <label for="rating1{{$allTrainer->id}}" class="fa fa-star"></label>
        <input type="radio" value="2" name="trainer_rating" id="rating2{{$allTrainer->id}}">
        <label for="rating2{{$allTrainer->id}}" class="fa fa-star"></label>
        <input type="radio" value="3" name="trainer_rating" id="rating3{{$allTrainer->id}}">
        <label for="rating3{{$allTrainer->id}}" class="fa fa-star"></label>
        <input type="radio" value="4" name="trainer_rating" id="rating4{{$allTrainer->id}}">
        <label for="rating4{{$allTrainer->id}}" class="fa fa-star"></label>
        <input type="radio" value="5" name="trainer_rating" id="rating5{{$allTrainer->id}}">
        <label for="rating5{{$allTrainer->id}}" class="fa fa-star"></label>
    </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
        <button type="sumit" class="btn btn-primary">Oceń</button>
      </div>
      </form>
    </div>
  </div>
</div>
        @endforeach
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@include('adminLte/templateBottom')
