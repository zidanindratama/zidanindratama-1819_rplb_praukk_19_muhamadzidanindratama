<!doctype html>
<html lang="en">
       <head>
              <title>@yield('judul')</title>
              <!-- Required meta tags -->
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
              
              <!-- Primary Meta Tags -->
              <title>WarungKita - Warung Cepat Saji</title>
              <meta name="title" content="WarungKita - Warung Cepat Saji">
              <meta name="description" content="Di sini, kamu bisa temukan informasi mengenai cita rasa menu halal WarungKita yang berkualitas, bagaimana kami menjaga kebersihan restoran, serta komitmen kami dalam mengutamakan kepuasan pelanggan.">

              <!-- Open Graph / Facebook -->
              <meta property="og:type" content="website">
              <meta property="og:url" content="https://warungkita001.000webhostapp.com/">
              <meta property="og:title" content="WarungKita - Warung Cepat Saji">
              <meta property="og:description" content="Di sini, kamu bisa temukan informasi mengenai cita rasa menu halal WarungKita yang berkualitas, bagaimana kami menjaga kebersihan restoran, serta komitmen kami dalam mengutamakan kepuasan pelanggan.">
              <meta property="og:image" content="{{asset('warung_kita/assets/img/lasagna.png')}}">

              <!-- Twitter -->
              <meta property="twitter:card" content="summary_large_image">
              <meta property="twitter:url" content="https://warungkita001.000webhostapp.com/">
              <meta property="twitter:title" content="WarungKita - Warung Cepat Saji">
              <meta property="twitter:description" content="Di sini, kamu bisa temukan informasi mengenai cita rasa menu halal WarungKita yang berkualitas, bagaimana kami menjaga kebersihan restoran, serta komitmen kami dalam mengutamakan kepuasan pelanggan.">
              <meta property="twitter:image" content="{{asset('warung_kita/assets/img/lasagna.png')}}">

              <link rel="apple-touch-icon" sizes="180x180" href="{{asset('warung_kita/assets/favicon/apple-touch-icon.png')}}">
              <link rel="icon" type="image/png" sizes="32x32" href="{{asset('warung_kita/assets/favicon/favicon-32x32.png')}}">
              <link rel="icon" type="image/png" sizes="16x16" href="{{asset('warung_kita/assets/favicon/favicon-16x16.png')}}">
              <link rel="manifest" href="{{asset('warung_kita/assets/favicon/site.webmanifest')}}">

              <!-- Bootstrap CSS -->
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

              <!-- Custom CSS -->
              <link rel="stylesheet" href="{{asset('warung_kita/assets/css/main.css')}}">

              <!-- Animation on scroll -->
              <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

              <!-- Fontawesome -->
              <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

              <!-- Font -->
              <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet">
       </head>
       <body>
	   	@include('layout-default.navbar')
              @yield('content')
              @include('layout-default.footer')
              @include('sweetalert::alert')
              <!--Start of Tawk.to Script-->
              <script type="text/javascript">
                     var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                     (function(){
                     var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                            s1.async=true;
                            s1.src='https://embed.tawk.to/604809631c1c2a130d66ce20/1f0cm9bbv';
                            s1.charset='UTF-8';
                            s1.setAttribute('crossorigin','*');
                            s0.parentNode.insertBefore(s1,s0);
                     })();
              </script>
              <!--End of Tawk.to Script-->
              <!-- Optional JavaScript -->
              <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

              <!-- Animation on scroll -->
              <script>
                     AOS.init();
              </script>
              <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
              <!-- jQuery first, then Popper.js, then Bootstrap JS -->
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       </body>
</html>