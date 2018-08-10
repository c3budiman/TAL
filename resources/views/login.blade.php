<!DOCTYPE html>
<?php
  $logo = DB::table('setting_situses')->where('id','=','1')->first()->logo;
  $judul = DB::table('setting_situses')->where('id','=','1')->first()->namaSitus;
  $favicon =DB::table('setting_situses')->where('id','=','1')->first()->favicon;
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{$judul}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{{ asset('$favicon') }}}">
        <!-- Sweet Alert css -->
        <link href="plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('gambar/slide01.jpg');background-size: cover;"></div>
        <div class="wrapper-page account-page-full">
            <div class="card">
                <div class="card-block">
                    <div class="account-box">
                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.html" class="text-success">
                                    <span><img src="{{$logo}}" alt="" height="100"></span>
                                </a>
                            </h2>
                            <div class="pb-4">
                              <blockquote class="blockquote text-center">
                                  <footer class="blockquote-footer">UG - SISTEM MANAJEMEN SURAT</footer>
                              </blockquote>
                            </div>
                            <form class="" method="post" action="{{url(action('loginController@postLogin'))}}">
                              {{ csrf_field() }}
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Alamat Email</label>
                                        <input required name="email" class="form-control" type="email" id="emailaddress" required="" placeholder="Alamat Email">
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input required name="password" class="form-control" type="password" required="" id="password" placeholder="Masukkan password anda">
                                    </div>
                                </div>
                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-custom">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember">
                                                Remember me
                                            </label>
                                            <a href="/lupa_password" class="text-muted pull-right"><small>Lupa password?</small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright"><?php echo date("Y"); ?> GUCC © UG - Sistem Manajemen Surat.</p>
            </div>
        </div>
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
          <!-- Sweet Alert Js  -->
          <script src="plugins/sweet-alert/sweetalert2.min.js"></script>
          @if (session('status'))
            <script type="text/javascript">
            !function ($) {
              "use strict";
              var SweetAlert = function () {
              };
              SweetAlert.prototype.init = function () {
                  $(document).ready(function () {
                      swal(
                          {
                              title: 'Sukses!',
                              text: '{{ session('status') }}',
                              type: 'success',
                              confirmButtonClass: 'btn btn-confirm mt-2'
                          }
                      )
                  });
                },
             $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
                  }(window.jQuery),
                    function ($) {
                        "use strict";
                        $.SweetAlert.init()
                    } (window.jQuery);
            </script>
          @endif

          @if($errors->any())
          <script type="text/javascript">
          !function ($) {
            "use strict";
            var SweetAlert = function () {
            };
            SweetAlert.prototype.init = function () {
                $(document).ready(function () {
                    swal(
                        {
                            title: 'Error!',
                            text: '{{$errors->first()}}',
                            type: 'error',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        }
                    )
                });
              },
           $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
                }(window.jQuery),
                  function ($) {
                      "use strict";
                      $.SweetAlert.init()
                  } (window.jQuery);
          </script>
          @endif
    </body>
</html>
