<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--<a href="{{ URL::route('home') }}" class="navbar-brand logo">Homes Store</a>--}}

        </div>  <!-- navbar-header -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Uncommon Service, Outstanding Results"><img src="/images/logo/Homes-Store-Logo.png" alt="Homes Store Logo"></a></li>
                <li><a href="{{ URL::route('home') }}" class="navbar-brand logo">Homes Store</a></li>
                <li><a href="#" >Search</a></li>
                <li><a href="#" >Resources</a></li>
                <li><a href="#" >About Us</a></li>
                <li><a href="{{ URL::route('contact') }}">Contact Us</a></li>
                @if (Auth::check())
                    @if (Auth::User()->hasRole('administrator'))
                        <li class="dropdown" id="admin-options">
                            <a href="#" class="dropdown-toggle navbar-link" data-toggle="dropdown">Admin <i class="fa fa-caret-down"></i></a>
                        </li>

                            <ul class="dropdown-menu dropdown-with-icons">

                                <li>
                                    <a href="#">Verizon Report</a>
                                </li>

                            </ul>

                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                {{--If user is logged in display user email and menu options --}}
                @if(Auth::check())
                    <?php $UserID = Auth::user()->email; ?>
                    <li class="dropdown" id="account_options">
                        <a href="#" class="dropdown-toggle navbar-link" data-toggle="dropdown">
                            <img src="{{ gravatar_url($UserID, 20) }}" class="nav-gravatar img-circle" alt="{{ $UserID; }}">
                            {{ $UserID; }} <i class="fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-with-icons">

                            <li>
                                <a href="{{ URL::route('profile-user', ['email' => $UserID]) }}">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::route('account-sign-out') }}">
                                    <i class="fa fa-sign-out"></i> Log Out
                                </a>
                            </li>

                        </ul>

                    </li>

                {{--If user is not logged in display the log in option--}}
                @else

                    <li>
                        <a href="{{ URL::route('account-sign-in') }}">
                            <i class="fa fa-sign-in"></i> Log In
                        </a>
                    </li>

                @endif

            </ul>

        </div>

    </div>
</nav>



{{--<nav class="navbar navbar-fixed-top navbar-inverse">--}}
    {{--<ul class="nav navbar-nav">--}}
        {{--<li><a href="{{ URL::route('home') }}">Home</a></li>--}}
        {{--<li><a href="{{ URL::route('account-change-password') }}">Change password</a></li>--}}
        {{--@if(Auth::check())--}}
            {{--<li><a href="{{ URL::route('account-sign-out') }}"><span class="icon-doug_Bath"></span> Sign Out</a></li>--}}
        {{--@else--}}
            {{--<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>--}}
            {{--<li><a href="{{ URL::route('account-create') }}">Create an account</a></li>--}}
            {{--<li><a href="{{ URL::route('account-forgot-password') }}">Forgot password</a></li>--}}
        {{--@endif--}}
    {{--</ul>--}}
{{--</nav>--}}