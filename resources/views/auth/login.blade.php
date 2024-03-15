<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="backend/images/logo/logo.png" type="backend/image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="backend/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="backend/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="backend/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="backend/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="backend/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="backend/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="backend/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="backend/js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="frontend/assets/img/wahidsLab_logo1.png" style="width:100px; height=50px;" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                    @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="">Forgotten Password?</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Sing In</button>
                           </div>
                        </fieldset><br>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Don't Have an Account?</h3>
                                </div>
                                <div class="col-md-4">
                                    <h3>
                                        <a href="{{route('auth.register')}}" style="margin-left:-20px; color:blue;">Register</a>
                                    </h3>

                                </div>
                            </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="backend/js/jquery.min.js"></script>
      <script src="backend/js/popper.min.js"></script>
      <script src="backend/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="backend/js/animate.js"></script>
      <!-- select country -->
      <script src="backend/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="backend/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="backend/js/custom.js"></script>
   </body>
</html>
