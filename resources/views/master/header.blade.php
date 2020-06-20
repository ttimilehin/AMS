<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: yellow;">
    <a class="navbar-brand pl-5 pr-5" href="{{url('home')}}"><img src="{{asset('public/img/logo.jpg')}}" style="width:60px; height: 60px" alt="">&nbsp;<span class="pr-5 pl-5" style="color: #ff0000;">Asset</span></a>
    <button class="navbar-toggler" style="background-color: #ff0000;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span style="color: #ff0000;" class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" style="color: #ff0000;" href="{{route('home')}}">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #ff0000;" href="{{route('asset.index')}}">Assets</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="color: #ff0000;" href="{{route('custodian.index')}}">Custodian</a>
          </li>
        </ul>
        <ul class="navbar-nav px-3">
            @auth
            <li class="nav-item text-nowrap dropdown pr-5 mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" style="color: #ff0000;" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{route('password')}}"> Change Password</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
        @endif
        </ul>
      </div>
</nav>
