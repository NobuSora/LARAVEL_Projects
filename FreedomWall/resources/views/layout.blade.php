<!DOCTYPE html>
<html lang="en">
<head>
  <title>FreedomWall</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <!-- font icons -->
  <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
  <!-- Bootstrap + JohnDoe main styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
	<link rel="stylesheet" href="/assets/css/johndoe.css">
  <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
  
</head>


<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

  





    	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    
    

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope  -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>
    
    <!-- Google mpas -->
    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script> --}}

    <!-- JohnDoe js -->
    <script src="assets/js/johndoe.js"></script>
    <script src="assets/js/moment.js"></script>
    {{-- @yield('deleteScript') --}}
    @yield('addScript')

</body>
</html>
