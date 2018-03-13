<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                <span style="margin-top: 10px">Laraplace</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="/">Home</a></li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categories
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Category</h5>
                                        <ul>
                                            <li>
                                                <a href="#">Graphis & Design</a>
                                            </li>
                                            <li>
                                                <a href="#">Digital & Marketing</a>
                                            </li>
                                            <li>
                                                <a href="#">Video & Animation</a>
                                            </li>
                                            <li>
                                                <a href="#">Music & Video</a>
                                            </li>
                                            <li>
                                                <a href="#">Programming & Tech</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right">
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-primary navbar-btn">
                        <span class="hidden-sm">Login</span>
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary navbar-btn">
                        <span class="hidden-sm">Signup</span>
                    </a>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('gigs.create') }}">Create a gig</a></li>
                                <li><a href="{{ route('my_gigs') }}">My Gigs</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false">
                                Selling <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.requests', Auth::user()->name) }}">Buyer Requests</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false">
                                Contacts <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('my-buyer') }}">My Buyer</a></li>
                                <li><a href="">My Seller</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <i class="fa fa-fw fa-bell-o"></i> Notifications
                                <span class="badge">{{ count(Auth::user()->unreadNotifications) }}</span>
                            </a>
                            @if(count(Auth::user()->unreadNotifications) > 0)
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(Auth::user()->unreadNotifications as $notification)
                                        <li>
                                            <a href="{{ route('notification.show', $notification->id) }}">
                                                @if($notification->data['image'] == null)
                                                    <img src="/img/avatar.png" class="pull-left" height="50" width="50">
                                                @else
                                                    <img src="{{asset('/img/' . $notification->data['image'])}}"
                                                         class="pull-left" height="50" width="50">
                                                @endif
                                                {{ $notification->data['name'] }} {{ $notification->data['body'] }}
                                                <img src="{{asset('/gigs/img/'.App\Gig::find($notification->data['gig']['id'])->image)}}"
                                                     alt="" class="pull-right" style="width: 50px; height: 50px">
                                                <p class="center-block">{{Carbon\Carbon::parse($notification->data['created_at']['date'])->diffForHumans()}}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                @endif
            </div>

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <div class="collapse clearfix" id="search">

            <form method="get" class="navbar-form" role="search" action="{{route('search')}}">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" required placeholder="Search">
                    <span class="input-group-btn">
			            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		            </span>
                </div>
            </form>
        </div>
    </div>
</div>