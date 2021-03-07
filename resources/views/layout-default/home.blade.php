<!doctype html>
<html lang="en">
       <head>
              <title>Title</title>
              <!-- Required meta tags -->
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
              
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