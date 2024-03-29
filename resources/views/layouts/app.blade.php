@php
$setting = DB::table('sitesetting')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $setting->company_name }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">

    <!-- chart -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- test -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1141215736364599');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1141215736364599&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt=""></div>{{ $setting->phone_one }}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></div><a href="mailto:fastsales@gmail.com">{{ $setting->email }}</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">查看訂單</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">台灣<i class="fas fa-chevron-down"></i></a>
                                            <ul>

                                                @php
                                                $language = Session()->get('lang');
                                                @endphp

                                                <li>
                                                    @if( Session()->get('lang') == 'taiwan')
                                                    <a href="{{ route('language.english') }}">英文<i class="fas fa-chevron-down"></i></a>
                                                    @else
                                                    <a href="{{ route('language.taiwan') }}">台灣<i class="fas fa-chevron-down"></i></a>
                                                    @endif
                                                </li>
                                            </ul>

                                        </li>
                                        <!-- <li>
                                            <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div>
                                    <div><a href="{{ route('user.wishlist') }}">願望清單</a></div>
                                    <!-- <div><a href="{{ route('user.checkout') }}">登出</a></div> -->
                                    <div><a href="{{ route('register') }}">註冊</a></div>
                                    <div><a href="{{ route('login') }}">登入</a></div>
                                    <div><a href="{{ url('/admin/login') }}">後台登入</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.jpg') }}" alt=""></a></div>
                            </div>
                        </div>

                        @php
                        $category = DB::table('categories')->get();
                        @endphp

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form method="post" action="{{ route('product.search') }}" class="header_search_form clearfix">
                                            @csrf
                                            <input type="search" required="required" class="header_search_input" placeholder="尋找產品" name="search">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">所有類別</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        @foreach($category as $key)
                                                        <li><a class="clc" href="#">{{ $key->category_name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('frontend/images/search.png') }}" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">

                                    @guest

                                    @else
                                    @php
                                    $wishlist = DB::table('wishlists')->where('user_id', Auth::id())->get();
                                    @endphp
                                    <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">願望清單</a></div>
                                        <div class="wishlist_count">{{ count($wishlist) }}</div>
                                    </div>
                                </div>

                                @endguest

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('show.cart') }}">購物車</a></div>
                                            <div class="cart_price">{{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->


            <!-- Characteristics -->

            @yield('content')

            <!-- Footer -->
            @php
            $setting = DB::table('sitesetting')->first();
            @endphp

            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="#">{{ $setting->company_name }}</a></div>
                                </div>
                                <div class="footer_title">有任何問題請聯絡我</div>
                                <div class="footer_phone">{{ $setting->phone_two }}</div>
                                <div class="footer_contact_text">
                                    <p>{{ $setting->company_address }}</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="{{ $setting->instagram }}"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 offset-lg-2">
                            <div class="footer_column">
                                <!-- <div class="footer_title">Find it Fast</div> -->
                                <ul class="footer_list">
                                    <!-- <li><a href="#">Computers & Laptops</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Smartphones & Tablets</a></li>
                                    <li><a href="#">TV & Audio</a></li> -->
                                </ul>
                                <!-- <div class="footer_subtitle">Gadgets</div> -->
                                <ul class="footer_list">
                                    <!-- <li><a href="#">Car Electronics</a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <ul class="footer_list footer_list_2">
                                    <!-- <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Computers & Laptops</a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <!-- <div class="footer_title">Customer Care</div> -->
                                <ul class="footer_list">
                                    <!-- <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Customer Services</a></li>
                                    <li><a href="#">Returns / Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li> -->
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright -->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                                <div class="copyright_content">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    <!-- Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                                <div class="logos ml-sm-auto">
                                    <ul class="logos_list">
                                        <!-- <li><a href="#"><img src="{{ asset('frontend/images/logos_1.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_2.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_4.png') }}" alt=""></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!--Order Traking Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">訂單號</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label>單號</label>
                            <input type="text" name="code" required="" class="form-control" placeholder="Your Order Status Code">
                        </div>

                        <button class="btn btn-danger" type="submit">確認</button>

                    </form>


                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ asset('frontend/js/product_custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    </script>
    @endif

    <script>
        $(document).on("click", "#return", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to Return?",
                    text: "Once Return, This will return your money!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Cancel!");
                    }
                });
        });
    </script>

</body>

</html>