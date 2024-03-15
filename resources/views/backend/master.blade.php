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
      <title>Welocome</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="backend/images/fevicon.png" type="image/png" />
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
      <!-- fancy box js -->
      <link rel="stylesheet" href="backend/css/jquery.fancybox.css" />
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page invoice_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            @include('backend.layout.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
            @include('backend.layout.navbar')
               <!-- end topbar -->
               <!-- dashboard inner -->
               @yield('content')

               <!-- end dashboard inner -->
               <!-- footer -->
               @include('backend.layout.footer')
            </div>
         </div>
         <!-- end model popup -->
      </div>
      <!-- jQuery -->
      <script src="backend/js/jquery.min.js"></script>
      <script src="backend/js/popper.min.js"></script>
      <script src="backend/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="backend/js/animate.js"></script>
      <!-- select country -->
      <script src="backend/js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="backend/js/owl.carousel.js"></script>
      <!-- chart js -->
      <script src="backend/js/Chart.min.js"></script>
      <script src="backend/js/Chart.bundle.min.js"></script>
      <script src="backend/js/utils.js"></script>
      <script src="backend/js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="backend/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- fancy box js -->
      <script src="backend/js/jquery-3.3.1.min.js"></script>
      <script src="backend/js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="backend/js/custom.js"></script>
      <!-- calendar file css -->
      <script src="backend/js/semantic.min.js"></script>
   </body>
</html>
