<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title> Vehicle record system and montiroing </title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="navbar-top-fixed.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
  </head>
  <body>

    <!-- FIXED NAVBAR HEADER -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">VR-Records</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="login.php">Admin</a>
          </li>
          </ul>
        </div></div></nav>
   <!--End of navbar-->



   <!--Carousel-->
   <article class="my-3" id="carousel">
      <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
           
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
           <img src="assets/img/banner44.jpg" width="100%" height="50%" role="img" aria-label="Placeholder: Second slide" preserveAspectRatio="xMidYMid slice" focusable="false">
      
           
          </div>
          


      </div>
      </div>
    </div>
  </article>
<!--End of carousel-->

<!--Search holder -->
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h5 class="fw-light">VR-Records, record and monitoring System for you.</h5>
      <form class="d-flex" action="allvehicles.php" method="get">
        <input class="form-control me-2" type="search" name="reg_no" placeholder="Enter reg number to search records" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div></div>
  </section>
 
<!--End of Search -->


 
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <img src="assets/img/qr.png" width="100%" height="50%" >
           
            <div class="card-body">
              <div class="mb-2 text-success" >QR Code</div>
              <p class="card-text">Registered information are saved as qr code data.</p>
              <div class="d-flex justify-content-between align-items-center">
             
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <img src="assets/img/alerts.png"  width="100%" height="50%" >
           
            <div class="card-body">
              <div class="mb-2 text-success" >Driver's License</div>
              <p class="card-text"> Registered vehicles have their licenses as important document on the system</p>
              <div class="d-flex justify-content-between align-items-center">
               
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            
           <img src="assets/img/dashboard.png" width="100%" height="50%" >
            <div class="card-body">
              <div class="mb-2 text-success" >Admin Dashboard</div>
              <p class="card-text">Super admin has access to information of registered vehicles.
               
              </p>
              <div class="d-flex justify-content-between align-items-center">
                
              </div>
            </div>
          </div>
        </div>
      </div>

    
</main>


 <!--Header 2-->
 <section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">VR-Records</h1>
      <p class="lead text-muted">VR records is a vehicle management system, that keeps track of all vehicle within an environment for proper monitoring to avoid stealing or damage by unknown drivers.</p>
      <p>
       
      </p>
    </div>
  </div>
</section>


<!--Header 2-->




  <!-- Features -->
  <section class="py-5 te">
    <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">search</strong>
            <h3 class="mb-0">Search using Reg Number</h3>
            <div class="mb-1 text-muted">VR-Records</div>
            <p class="card-text mb-auto">VR Records allows you as a logged admin the privilege to search for vehicles that has been recorded using the registration number of that vehicle.</p>
            
          </div>
          <div class="col-auto d-none d-lg-block">
            
            <video  width="200" height="250" ccontrols="false" loop="true" autoplay="true">
              <source src="assets/img/vid.mp4"   type="video/mp4">
            
            </video>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Records</strong>
            <h3 class="mb-0">Documented records</h3>
            <div class="mb-1 text-muted">VR-Records</div>
            <p class="mb-auto">The system documents your car details such as driver's license & vehicle license, passport photograph of the drivers.</p>
            
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="assets/img/live.png" width="200" height="250"  >
          </div>
        </div>
      </div>
    </div>
  
    <!--End of features-->
  

</section></div></div>


<!-- FOOTER SECTION -->

<nav class="navbar navbar-expand-md navbar-dark navbar-bottom bg-dark">
  <div class="container-fluid">
    <footer class="text-muted py-5">
      <div class="container">
        <p class="float-end mb-1">
     
          <a href="#"> <button class="float float-end mb-1 btn-dark"> TOP</button></a>
        </p>
        <p class="mb-1">VRT  &copy; Group 9 _Software Engineering</p>
        <p class="mb-0">About VR-Records System <a href="/">About</a> get in contact with us <a href="/">contact us</a>.</p>
      </div>
    </footer>
    </div></nav>



<!--End of Footer-->




    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function myFunction() {
        window.location.href="dash.htm";
      } </script>
  </body>
</html>

