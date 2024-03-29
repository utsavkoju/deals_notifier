<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Deal Notifiers</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('/deals') }}">All Deals</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="{{ URL::to('product/search')}}">
      <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/login') }}">Login</a>
      </li>
    </ul>
  </div>
</nav>
</header>