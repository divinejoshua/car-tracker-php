

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Add Admins</title>

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
   
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    
    <!-- Bootstrap core CSS -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">VR Records Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="index.htm">Log out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link" href="index.htm">
              <span data-feather="home"></span>
              Home
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dash.htm">
              <span data-feather="bar-chart-2"></span>
              Recent Searches
            </a>
        </li>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="profile.htm">
              <span data-feather="users"></span>
              Add Admin
            </a>
          </li>
          
        
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Other Settings</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="vehicle.htm">
                <span data-feather="plus-circle"></span>
                Add New vehicle
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="allvehicles.htm">
              <span data-feather="file-text"></span>
              View All Vehicles
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.htm">
              <span data-feather="users"></span>
              Log out
            </a>
          </li>
        
      </div>
    </nav>