<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Team Kaj</span>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li><a href="{{ url('products/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
       
                    @foreach($categoriesmenu as $categories)
                       <li><a href="{{action('CategoriesController@show', $categories->slug)}}">{{$categories->name}}</a></li>
                    @endforeach
                    </ul>
                </li>
            </ul>       

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                @else
                    <li><a href="{{ url('products/create') }}">Create new Product</a></li>
                    <li><a href="{{ url('categories/create') }}">Create/View Categories</a></li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->user_type == 0)
                                <li><a href="{{ action('AdminController@index') }}">Manage admins</a></li>
                            @endif
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>