<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">
    <title>The Finard | Daily bits and bobs in shining 18 K gold </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon/thefinard.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <meta name="description" content="The Finard helps you create the bespoke jewelry of your dreams. From unique semi-precious stone to diamond engagement rings.">
    <meta name="keywords" content="rings, diamond, carat, 18K, gold, engagement, wedding bands, bands, ring, band, jewelry, fine, custom">

    <!-- CSS -->
    @yield('css')
    
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/front.css?v.2') }}" rel="stylesheet"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154228788-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-154228788-1');
	</script>

    <style>
        .fix-wa { position: fixed; right: 15px; bottom: 50px; z-index: 100; }
        .fix-wa img { height: 40px; }
        @media (max-width: 767px) {
            .fix-wa img { width: 40px; }
        }
    </style>

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
                        <a href="{{ URL::to('/') }}" aria-label="The Finard">
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
                        <li><a href="{{ $company_data->facebook }}"  aria-label="Facebook The Finard" target="_blank" rel="noreferrer noopener"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $company_data->instagram }}" aria-label="Instagram The Finard" target="_blank" rel="noreferrer noopener"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $company_data->pinterest }}" aria-label="Pinterest The Finard" target="_blank" rel="noreferrer noopener"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <div class="img">
                        <a href="{{ $company_data->bridestory }}" aria-label="Bridestory The Finard" title="The Finard" target="_blank" rel="noreferrer noopener"><img alt="The Finard" width="164" height="25" src="https://business.bridestory.com/assets/images/badges/certified/pink.png" /></a>
                    </div>
                </div>
                <div class="col-6 col-md-2 order-3 order-md-2 resp-center">
                    <div class="t-footer">The Finard</div>
                    <ul class="l-footer">
                        <li><a href="{{ URL::to('/ring-sizer') }}">Ring sizer</a></li>
                        <li><a href="{{ URL::to('/quotation-form') }}">Quotation</a></li>
                        <li><a href="{{ URL::to('/appointment-engagement') }}">Book Appointment</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 order-3 order-md-2 resp-center">
                    <div class="t-footer">Support</div>
                    <ul class="l-footer">
                        <li><a href="{{ URL::to('/faq') }}">FAQ</a></li>
                        <li><a href="https://www.jne.co.id/en/tracking/trace" target="_blank" rel="noreferrer noopener">Track Package</a></li>
                        <li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 order-1 order-md-3 xs40 resp-center">
                    <div class="t-footer">Keep in Touch</div>
                    <form method="post" action="{{ URL::to('/newsletter') }}">
                        {!! csrf_field() !!}
                        <div class="input-group">
                            <input type="email"  autocomplete="off" name="email" required="required" class="form-control" placeholder="hello@thefinard.com" aria-label="hello@thefinard.com" aria-describedby="">
                            <div class="input-group-append">
                                <button class="btn" type="submit">SIGN UP</button>
                            </div>
                        </div>
                    </form>
                    <div class="txt">By entering your email above you agree to receive updates.</div>
                </div>
            </div>
            <div class="cp">
                <p> &copy;<?php echo date("Y"); ?> THE FINARD. CRAFTED BY <a href="https://dilenium.com" target="_blank" rel="noreferrer noopener">DILENIUM</a>. </p> 
            </div>
        </div>
    </footer>

    @if ($message_success= Session::get('success_newsletter'))
    <div id="success-modal" class="modal fade" role="dialog" tabindex='-1'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-pop" data-dismiss="modal"><i class="fas fa-times"></i></div>
                <div class="t-pop">Success</div>
                <div class="bdy-pop">
                    <p>Thank you, your email has been subscribed with us. Please wait for the latest updates. </p>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($message_error= Session::get('error_newsletter'))
    <div id="error-modal" class="modal fade" role="dialog" tabindex='-1'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-pop" data-dismiss="modal"><i class="fas fa-times"></i></div>
                <div class="t-pop">Failed</div>
                <div class="bdy-pop">
                    <p>Your email has been registered before. Please try again.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

<!--
<div class="fix-wa">
    <div style="font-size: 10px; text-align:center; color:#6a111e; font-weight:bold;"> Hi!</div>
	<a href="https://api.whatsapp.com/send?phone=62816295230" target="_blank">
		<img src="{{ url('images/whatsapp.png')}}">
	</a>
</div>
-->

<!-- JS -->
<script type="text/javascript" src="{{ asset('jquery-3.4.1.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('web.js') }}"></script>
@if ($message_success= Session::get('success_newsletter'))
<script>
    $(function() {
            $("#success-modal").modal("toggle");
    });
</script>
@endif

@if ($message_error= Session::get('error_newsletter'))
<script>
    $(function() {
        $('#success-modal').modal('hide');
        $("#error-modal").modal("toggle");
    });
</script>
@endif

@yield('js')

</body>
</html>
        
