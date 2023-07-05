<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" style="padding:1rem;" class="brand-link">
        <span  class="brand-text font-weight-light font-weight-bold">.Exercise</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            @if(Auth::user()->image)
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">
            @endif
                <a href="#" style="display:inline-block !important;" class="d-block"> {{ Auth::user()->name }} {{ Auth::user()->surname }}  </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="home" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Panel główny
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                        <p> Użytkownicy<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                @if (Auth::user()->account_type=="Właściciel")
                <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Zarządzaj uzytkownikami</p>
                </a>
                </li>
                @endif
                @if (Auth::user()->account_type!="Karnetowicz")
                <li class="nav-item">
                    <a href="addowner" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dodaj użytkownika</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="trainers" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Trenerzy</p>
                    </a>
                </li>
            </ul>
         </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Płatności
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->account_type=="Właściciel")
                        <li class="nav-item">
                            <a href="order_history_all" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Historia operacji</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="order_history" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Twoje zamówienia</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-heartbeat"></i>
              <p>
                Status zdrowia
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="bmi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kalkulator BMI</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kcal" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kalkulator kalorii</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
              <p>
                Karnety
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="membership" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Przegląd karnetów</p>
                </a>
              </li>
              @if (Auth::user()->account_type!="Karnetowicz")
              <li class="nav-item">
                <a href="addkarnet" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dodaj karnet</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
                <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                Zestawy ćwiczeń
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Podgląd zestawów</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dodaj zestaw</p>
                </a>
              </li>
            </ul>
          </li>
                <li class="nav-item">
                    <a href="exerciseCalendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Kalendarz<span class="badge badge-info right"></span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="mail" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                        <p>Wiadomości</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Ustawienia</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Wyloguj</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
