<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>The Finard</title>
    <!--<link rel="shortcut icon" type="image/x-icon" href="assets/images/uploads/favicon.ico" />-->
    
    <!-- CSS -->
    @yield('css')
    
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/front.css') }}" rel="stylesheet"/>

</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-3 visible-md my-auto">
                    <div class="click-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div class="col-6 col-lg-12 my-auto">
                    <div class="logo">
                        <a href="{{ URL::to('/') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="" title=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-menu">
            <div class="container">
                <ul class="list-menu">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    @foreach($category as $cat)
                    <li>
                        <a href="{{ URL::to('/shop/'.$cat->slug) }}">{{ $cat->name }}</a> @if(count($cat->sub_categories)>0)<span class="drop-menu {{ $cat->slug }}"><i class="fas fa-caret-down"></i></span> @endif
                        @if(count($cat->sub_categories)>0)
                        <ul class="have-drop {{ $cat->slug }}">
                            @foreach($cat->sub_categories as $sub)
                            <li><a href="{{ URL::to('/shop/category/'.$sub->slug) }}">{{ $sub->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    <li><a href="{{ URL::to('/contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="main-menu">
        <div class="container">
            <ul class="l-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                @foreach($category as $cat)
                <li>
                    <a @if(count($cat->sub_categories)>0) class="dropbtn" @endif href="{{ URL::to('/shop/'.$cat->slug) }}">{{ $cat->name }}</a>
                    @if(count($cat->sub_categories)>0)
                    <div>
                        <div class="sub-menu">
                            <ul>
                                @foreach($cat->sub_categories as $sub)
                                <li><a href="{{ URL::to('/shop/category/'.$sub->slug) }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </li>
                @endforeach
                
                <li><a href="{{ URL::to('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="main">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 order-2 xs40 resp-center">
                    <div class="t-footer"><a href="mailto:the.finard@gmail.com">the.finard@gmail.com</a></div>
                    <ul class="l-soc">
                        <li><a href="{{ $company_data->facebook }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $company_data->instagram }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $company_data->pinterest }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <div class="img">
                        <img src="{{ asset('images/bridestory.png') }}" alt="Bridestory" title="Bridestory"/>
                    </div>
                </div>
                <div class="col-6 col-md-2 order-3 order-md-2 resp-center">
                    <div class="t-footer">About</div>
                    <ul class="l-footer">
                        <li><a href="{{ URL::to('/journal') }}">Journal</a></li>
                        <li><a href="{{ URL::to('/ring-sizer') }}">Ring sizer</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 order-3 order-md-2 resp-center">
                    <div class="t-footer">Support</div>
                    <ul class="l-footer">
                        <li><a href="{{ URL::to('/faq') }}">FAQ</a></li>
                        <li><a href="https://www.jne.co.id/en/tracking/trace" target="_blank">Track Package</a></li>
                        <li><a href="{{ URL::to('/contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 order-1 order-md-3 xs40 resp-center">
                    <div class="t-footer">Keep in Touch</div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="you@domain.com" aria-label="you@domain.com" aria-describedby="">
                        <div class="input-group-append">
                            <button class="btn" type="button">SIGN UP</button>
                        </div>
                    </div>
                    <div class="txt">By entering your email above you agree to receive updates.</div>
                </div>
            </div>
        </div>
    </footer>

<!-- JS -->
<script type="text/javascript" src="{{ asset('jquery-3.4.1.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('web.js') }}"></script>
@yield('js')

</body>
</html>
        
