<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-newspaper-o"></i> ReadMe</a>
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">
    @if(Auth::check())
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="{{route('entries_create')}}"><i class="fa fa-file"></i> Create Entry</a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('users.show', [Auth::user()->slug]) }}">My profile</a></li>
          <li class="divider"></li>
          <li><a href="{{route('logout')}}">Logout</a></li>
        </ul>
      </li>
    </ul>
    @else
    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{route('sign.in')}}" >Sign in</a>
        </li>
        <li>
          <a href="{{route('register')}}" >Create an Account</a>
        </li>
      </ul>
    </div>
    @endif

  </div>
</div>
