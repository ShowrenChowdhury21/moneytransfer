﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoneyTransfer - User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleuser.css') }}"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>

<!-- Document Wrapper -->
<div id="main-wrapper">
    <header class="header02">
        <!--header -->
        <div class="header-main">
            <div class="container d-flex align-items-center">
                <a class="logo d-inline-flex" href="#">
                    <img src="{{ asset('assets/img/logo/logo3.png') }}" alt="">
                </a>
                <nav class="primary-menu ml-auto">
                    <a id="logout" href="/login"><i class="fas fa-sign-out-alt" style="color: #413c69; font-size: 30px;"></i></a>
                    <ul>
                        <li class="has-menu-child pro-menu-drop">
                            <a href="#">
                                <div class="header-pro-thumb"></div>{{Session::get('name')}}<i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu-md sub-menu profile-drop">
                                 <li class="dropdown-header">
                                    <div>
                                        <h5 class="hidden-xs m-b-0 text-primary text-ellipsis" style="font-size: 16px;">{{Session::get('name')}}</h5>
                                        <div class="small text-muted"><span>Membership ID {{Session::get('id')}}</span></div>
                                    </div>
                                </li>
                                <li><hr class="mx-n3 mt-0"></li>
                                <li class="nav__create-new-profile-link">
                                    <a href="/user/profile">
                                        <span>View personal profile</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="nav__dropdown-menu-items">
                                    <a href="/login"><i class="icon icon-logout"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--end main header-->
    </header>
    <!-- Header end -->
    <!-- Content  -->
    <div id="content" class="py-4">
        <div class="container">
            <div class="row">
                <!-- Left side bar -->
                <aside class="col-lg-3 sidebar">
                    <!-- Pages List  -->
                    <div class="bg-light shadow-sm text-center  mb-4">
                        <div class="Profile-menu">
                            <ul class="nav secondary-nav">
                                <li class="nav-item"><a class="nav-link " href="/user/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/transactions"><i class="fa fa-list-ul"></i> Transactions</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/deposit"><i class="fa fa-plus"></i> Deposit Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/sendmoney"><i class="far fa-paper-plane"></i> Send Money</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/user/withdraw"><i class="fa fa-wallet"></i> Withdraw Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/profile"><i class="fa fa-user"></i> Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/cardandbank"><i class="fa fa-university"></i> Cards & Bank Accounts</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/help"><i class="fas fa-hands-helping"></i> Help</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/verification"><i class="fas fa-cog"></i>Verification</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pages List End -->
                </aside>
                <!-- Left Panel End -->

                <div class="col-lg-9">
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="bg-white">
                        <div class="container d-flex justify-content-center primary-menu ml-auto">
                            <ul class="nav pro-sec-menu secondary-nav alternate">
                                <li class="has-menu-child nav-item">
                                    <a class="nav-link" href="/user/deposit">Deposit</a>
                                </li>
                                <li class="has-menu-child nav-item">
                                    <a class="nav-link" href="/user/sendmoney">Send</a>
                                </li>
                                <li class="has-menu-child nav-item active">
                                    <a class="nav-link" href="/user/withdraw">Withdraw</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="text-5 font-weight-700 d-flex admin-heading">Deposit Money</h3>
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 mx-auto ">

                                <!-- Withdraw Money Form  -->
                                <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4  form-box">
                                    <div class="text-center p-4 rounded mb-4" style="background-color: #413c69;">
                                        <h3 class="text-10 text-white font-weight-400">{{Session::get('currency')}} : {{Session::get('balance')}}</h3>
                                        <p class="text-white">Available Balance</p>
                                    </div>
                                    <form id="form-send-money" method="post" action="/user/withdraw/withdrawrequest">
                                        @csrf
                                        <div class="form-group">
                                            <label for="withdrawto">Withdraw to</label>
                                            <select id="withdrawto" name ="withdrawto" class="custom-select" required>
                                                @foreach ($banks as $bank)
                                                <option value="{{$bank->accountno}}">{{$bank->bankname}} - {{$bank->accountno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="youSend">Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text currency-icon">{{Session::get('currency')}}</span>
                                                </div>
                                                <input type="text" class="form-control" name="yousend" id="youSend" placeholder="Enter amount..." oninput="totalcount()">
                                            </div>
                                        </div>
                                        <p class="mb-1">Total fees <span class="text-3 float-right" id="fees"></span></p>
                                        <p class="font-weight-500">Total <span class="text-3 float-right" id="total">USD</span></p>
                                        <input type="hidden" id="totalamount" name="totalamount">
                                        <button class="btn btn-default btn-center btn-block">
                                            <span class="bh"></span>
                                            <span>Continue</span>
                                        </button>
                                    </form>
                                </div>
                                <!-- Withdraw Money Form end -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Content end -->


    <!-- Footer strat -->
    <footer id="footer" style="margin-top: 30px;">
        <div class="container">
           <div class="row">
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Redirects</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/transaction">Send Money</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/transaction">Recieve Money</a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Custonmer AID</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/aboutus">About us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/user/help">Need help?</a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Contact & Support</span>
                    </li>
                    <li class="nav-item">
                       <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/contact"><i class="fas fa-envelope"></i>Contact us</a>
                    </li>
                 </ul>
              </div>
           </div>
           <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>
           <div class="row text-center">
              <div class="col-md-4 box">
                 <span class="copyright quick-links">
                    Copyright &copy; MoneyTransfer <script>document.write(new Date().getFullYear())</script>
                 </span>
              </div>
              <div class="col-md-4 box">
                 <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-twitter"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-facebook-f"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-instagram"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-linkedin-in"></i>
                       </a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 box">
                 <ul class="list-inline quick-links">
                    <li class="list-inline-item">
                       <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">Terms of Use</a>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
     </footer>
    <!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Script -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    var val = document.getElementById("youSend");
    function totalcount()
    {
      var val1 = parseFloat(val.value);
      if (isNaN(val1)) val1 = 0;
      var fees = val1 * 0.03;
      var total = val1 + fees;
      document.getElementById("fees").innerHTML = fees;
      document.getElementById("total").innerHTML = total;
      document.getElementById("total").value = total;
      document.getElementById("totalamount").value = total;
      }
</script>
</body>
</html>
