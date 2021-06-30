<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

    <!-- Title Page-->
    <title>@yield('title') - Admin Panel</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h1>Admin Panel</h1>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                       <li class="@yield('dashboard')">
                            <a href="{{url('admin')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub" class="@yield('pagesM')">
                            <a class="js-arrow open" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/pages/home')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/about')}}">About</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/barbers')}}">Barbers</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/galery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/feedback')}}">Feedback</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/pricing')}}">Pricing</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/booking')}}">Booking</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@yield('orderan')">
                            <a href="{{url('admin/orderan')}}">
                                <i class="fas fa-dollar"></i>Orderan</a>
                        </li>
                        <li class="@yield('barbers')">
                            <a href="{{url('admin/barbers')}}">
                                <i class="fas fa-user"></i>Barbers</a>
                        </li>
                        <li class="@yield('services')">
                            <a href="{{url('admin/services')}}">
                                <i class="fas fa-cut"></i>Services</a>
                        </li>
                        <li class="@yield('time')">
                            <a href="{{url('admin/time')}}">
                                <i class="fas fa-clock"></i>Time</a>
                        </li>
                        <li class="@yield('galery')">
                            <a href="{{url('admin/galery')}}">
                                <i class="fas fa-camera"></i>Gallery</a>
                        </li>
                        <li class="@yield('feedback')">
                            <a href="{{url('admin/feedback')}}">
                                <i class="fas fa-comments"></i>Feedback</a>
                        </li>
                        <li class="@yield('sosmed')">
                            <a href="{{url('admin/sosmed')}}">
                                <i class="fas fa-globe"></i>Sosial Media</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h3 align="center">Admin Panel</h3>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard')">
                            <a href="{{url('admin')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub @yield('pages')">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('admin/pages/home')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/about')}}">About</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/barbers')}}">Barbers</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/galery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/feedback')}}">Feedback</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/pricing')}}">Pricing</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/booking')}}">Booking</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/pages/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@yield('orderan')">
                            <a href="{{url('admin/orderan')}}">
                                <i class="fas fa-dollar"></i>Orderan</a>
                        </li>
                        <li class="@yield('barbers')">
                            <a href="{{url('admin/barbers')}}">
                                <i class="fas fa-user"></i>Barbers</a>
                        </li>
                        <li class="@yield('services')">
                            <a href="{{url('admin/services')}}">
                                <i class="fas fa-cut"></i>Services</a>
                        </li>
                        <li class="@yield('time')">
                            <a href="{{url('admin/time')}}">
                                <i class="fas fa-clock"></i>Time</a>
                        </li>
                        <li class="@yield('galery')">
                            <a href="{{url('admin/galery')}}">
                                <i class="fas fa-camera"></i>Gallery</a>
                        </li>
                        <li class="@yield('feedback')">
                            <a href="{{url('admin/feedback')}}">
                                <i class="fas fa-comments"></i>Feedback</a>
                        </li>
                        <li class="@yield('sosmed')">
                            <a href="{{url('admin/sosmed')}}">
                                <i class="fas fa-globe"></i>Sosial Media</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <style type="text/css">
            .overlay {
              position: fixed;
              top: 0;
              bottom: 0;
              left: 0;
              z-index: 99;
              right: 0;
              background: rgba(0, 0, 0, 0.7);
              transition: opacity 500ms;
              
            }
            .overlay:target {
              visibility: visible;
              opacity: 1;
            }

            .popup {
              margin: 70px auto;
              padding: 20px;
              background: #fff;
              border-radius: 5px;
              width: 30%;
              position: relative;
              transition: all 5s ease-in-out;
            }

            .popup h2 {
              margin-top: 0;
              color: #333;
              font-family: Tahoma, Arial, sans-serif;
            }
            .popup .close {
              position: absolute;
              top: 20px;
              right: 30px;
              transition: all 200ms;
              font-size: 30px;
              font-weight: bold;
              text-decoration: none;
              color: #333;
            }
            .popup .close:hover {
              color: #06D85F;
            }
            .popup .content {
              max-height: 30%;
              overflow: auto;
            }

            @media screen and (max-width: 700px){
              .box{
                width: 70%;
              }
              .popup{
                width: 70%;
              }
            }
        </style>

        <?php if (session()->has('errorCP') OR count($errors) > 0 ): ?>
            <div id="popup1" class="overlay">
            <div class="popup">
                <h2>ERROR</h2>
                <BUTTON  onclick="gone();" class="close">&times;</BUTTON>
                <div class="content">
                    {{session()->get('errorCP')}}
                    @if (count($errors) > 0)
                      <div style="margin: 0 auto; margin-top: 1em;" >
                          <ul>
                               @foreach ($errors->all() as $error)
                                <li style="list-style: none;">{{ $error }}</li>
                               @endforeach
                          </ul>
                      </div>
                  @endif
                </div>
            </div>          
        </div>
        <?php endif ?>
        <script type="text/javascript">
                function gone(){
                    document.getElementById=popup1.style.display = 'none'
                }
            </script>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session()->get('admin')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a onclick="showup();">
                                                        <i class="zmdi zmdi-settings"></i>Change Password</a>
                                                        <form style="display: none;"  id="change" action="{{url('admin/changePassword')}}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('POST')}}
                                                            <input required="" style="margin: 1em;" type="password" name="oldpass" placeholder="Old Password">
                                                            <input required="" style="margin: 1em;" type="password" name="newpass" placeholder="New Password">
                                                            <input required="" style="margin: 1em;" type="password" name="conpass" placeholder="Confirm Password">
                                                            <input type="submit" style="margin: 1em" name="submit" class="btn btn-success">
                                                        </form>
                                                        <script type="text/javascript">
                                                            function showup(){
                                                                if (document.getElementById=change.style.display == 'none') {
                                                                    document.getElementById=change.style.display = 'block'
                                                                }else{
                                                                document.getElementById=change.style.display = 'none'
                                                            }
                                                            }   
                                                        </script>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a onclick="return confirm('Yakin ingin logout?')" href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('isi')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2021 Tang-Obeng Team. All rights reserved. Template by <a target="_blank" href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('js/admin-main.js')}}"></script>

@yield('verify')

</body>

</html>
<!-- end document-->
