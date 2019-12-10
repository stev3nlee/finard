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
    <link href="{{ asset('css/front.css?v.2') }}" rel="stylesheet"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!--
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154228788-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-154228788-1');
	</script>
	-->

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
                    <div class="t-footer"><a href="mailto:{{ $company_data->email }}">{{ $company_data->email }}</a></div>
                    <ul class="l-soc">
                        <li><a href="{{ $company_data->facebook }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $company_data->instagram }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $company_data->pinterest }}" target="_blank" rel="noreferrer noopener"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <div class="img">
                        <a href="{{ $company_data->bridestory }}" title="The Finard" target="_blank" rel="dofollow"><img alt="The Finard" width="164" height="25" src="https://business.bridestory.com/assets/images/badges/certified/pink.png" /></a>
                    </div>
                </div>
                <div class="col-6 col-md-2 order-3 order-md-2 resp-center">
                    <div class="t-footer">About</div>
                    <ul class="l-footer">
                        <!-- <li><a href="{{ URL::to('/journal') }}">Journal</a></li> -->
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
                        <form method="post" action="{{ URL::to('/newsletter') }}">
                            {!! csrf_field() !!}
                            @if ($message_error = Session::get('error_newsletter'))
                              <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <p>{{ $message_error }}</p>
                              </div>
                            @endif

                            @if ($message_success= Session::get('success_newsletter'))
                              <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                  <p>{{ $message_success }}</p>
                              </div>
                            @endif
                            <input type="email" autocomplete="off" name="email" required="required" class="form-control" placeholder="hello@thefinard.com" aria-label="you@domain.com" aria-describedby="">
                            <div class="input-group-append">
                                <button class="btn" type="submit">SIGN UP</button>
                            </div>
                        </form>
                    </div>
                    <!-- NEW -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="hello@thefinard.com" aria-label="hello@thefinard.com" aria-describedby="">
                        <div class="input-group-append">
                            <a data-toggle="modal" data-target="#success-modal" data-keyboard="true">
                                <button class="btn" type="button">SIGN UP</button>
                            </a>
                        </div>
                    </div>
                    <!-- END NEW -->
                    <div class="txt">By entering your email above you agree to receive updates.</div>
                </div>
            </div>
        </div>
    </footer>

    <div id="success-modal" class="modal fade" role="dialog" tabindex='-1'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-pop" data-dismiss="modal"><i class="fas fa-times"></i></div>
                <div class="t-pop">Success</div>
                <div class="bdy-pop">
                    <p>Thank you, please wait for up to 24 hours for us to get reply back to you.</p>
                </div>
            </div>
        </div>
    </div>

<!-- JS -->
<script type="text/javascript" src="{{ asset('jquery-3.4.1.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('web.js') }}"></script>
@yield('js')

</body>
</html>
        
