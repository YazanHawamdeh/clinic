<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <link rel="stylesheet" href="sweetalert2.min.css">
  <link
  rel="icon"
  href="assets/img/kaiadmin/favicon.ico"
  type="image/x-icon"
/>
</head>
<body>
    <script src="http://www.w3schools.com/lib/w3data.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!--   Core JS Files   -->
    <script src={{asset("assets/js/core/jquery-3.7.1.min.js")}}></script>
    <script src={{asset("assets/js/core/popper.min.js")}}></script>
    <script src={{asset("assets/js/core/bootstrap.min.js")}}></script>

    <!-- jQuery Scrollbar -->
    <script src={{asset("assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js")}}></script>

    <!-- Chart JS -->
    <script src={{asset("assets/js/plugin/chart.js/chart.min.js")}}></script>

    <!-- jQuery Sparkline -->
    <script src={{asset("assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js")}}></script>

    <!-- Chart Circle -->
    <script src={{asset("assets/js/plugin/chart-circle/circles.min.js")}}></script>

    <!-- Datatables -->
    <script src={{asset("assets/js/plugin/datatables/datatables.min.js")}}></script>

    <!-- Bootstrap Notify -->
    <script src={{asset("assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js")}}></script>

    <!-- jQuery Vector Maps -->
    <script src={{asset("assets/js/plugin/jsvectormap/jsvectormap.min.js")}}></script>
    <script src={{asset("assets/js/plugin/jsvectormap/world.js")}}></script>

    <!-- Sweet Alert -->
    <script src={{asset("assets/js/plugin/sweetalert/sweetalert.min.js")}}></script>

    <!-- Kaiadmin JS -->
    <script src={{asset("assets/js/kaiadmin.min.js")}}></script>

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>

<script src="../assets/js/setting-demo2.js"></script>


<script src="assets/js/dashboard.js"></script>
{{-- <script src="multyselect/js/jquery.min.js"></script> --}}
<script src="multyselect/js/popper.js"></script>
<script src="multyselect/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="multyselect/js/main.js"></script>



    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}" />
    {{-- <link rel="stylesheet" href="{{asset("assets/css/plugins.min.css")}}" />
    <link rel="stylesheet" href="{{asset("assets/css/kaiadmin.min.css")}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset("assets/css/demo.css")}}" /> --}}



    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>


</body>
</html>



{{-- <script src="./js/script.js"></script>
<script src="./js/calender.js"></script> --}}
