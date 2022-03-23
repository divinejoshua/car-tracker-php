<?php
include('classes/DB.php');
$_SESSION['message'] = '';
if (isset($_POST['createaccount'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];



        // Validations   

        // if username exist 
        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

          // Check username length 
                if (strlen($username) >= 3 && strlen($username) <= 32) {

                  // Username regex 
                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {


                          // Password length 
                                if (strlen($password) >= 6 && strlen($password) <= 60) {

                                // Check if email is valid 
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


                                  // Check if email already exist
                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                      // Insert into database 
                                      DB::query('INSERT INTO users VALUES (\'\',  :firstname,  :lastname,  :username, :city, :state, :zipcode,  :email,  :password, :phone)', 
                                    
                                      array(':firstname'=>$firstname, ':lastname'=>$lastname, ':username'=>$username, ':city'=>$city, ':state'=>$state, ':zipcode'=>$zipcode, ':phone'=>$phone, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                     
                                     
                                      // $cstrong = True;
                                      // $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                      // $user_id = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                                      // DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                                      // setcookie("SNID", $token, time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                                      // setcookie("SNID_", '1', time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);

                                      $_SESSION['message'] = "<font color='green'>*Added successfully</font>";

                                } else {
                                       $_SESSION['message'] = "<font color='#F44336'>*This email account is taken</font>";
                                }
                        } else {
                                        $_SESSION['message'] = "<font color='#F44336'>*Invalid email !!!</font>";
                                }
                        } else {
                               $_SESSION['message'] = "<font color='#F44336'>*Ivalid password !!!</font>";
                        }
                        } else {
                               $_SESSION['message'] = "<font color='#F44336'>*Invalid Username !!!</font>";
                        }
                } else {
                       $_SESSION['message'] = "<font color='#F44336'>*Invalid Username !!!</font>";
                }

        } else {
                $_SESSION['message'] = "<font color='#F44336'>*Username is already taken !!!</font>";
        }
}
function isLoggedInUsername(){
    if (isset($_COOKIE['SNID'])){
        if (DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])))){
        $username = DB::query('SELECT username FROM users, login_tokens WHERE token=:token AND users.id = login_tokens.user_id', array(':token'=>sha1($_COOKIE['SNID'])))[0]['username'] ;
return $username;
        }

    }
    return false;
}

?>





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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
      </div>



    <!--content-->
    <main class="form-reg">
      <center><br>
            
              <h1 class="h6 mb-3 fw-normal">Register New Admin</h1>
          </center>
          <center><p class="font"><?= $_SESSION['message'] ?></p></center>


           <article class="my-3" id="validation">
              <div class="bd-example">
              <form class="row g-3"  action="admin.php" method="post">
          
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" class="form-control " name="firstname" id="validationServer01" placeholder="first name"  required>
                  <label for="validationServer01" class="form-label"> </label>
                  <label for="floatingInput">First Name</label>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer02" class="form-label"></label>
                  <input type="text" class="form-control " name="lastname" id="validationServer02" placeholder="last name"  required>
                  <label for="floatingInput">Last Name</label>
              </div>
                </div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServerUsername" class="form-label"></label>
                  <input type="text" class="form-control " name="username" id="validationServerUsername" placeholder="username" required>
                  <label for="floatingInput">Username</label>
              </div>
                </div>
             
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer03" class="form-label"></label>
                  <input type="text" class="form-control " name="city" id="validationServer03" placeholder="city"  required>
                  <label for="floatingInput">City</label>
                </div></div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" class="form-control " name="state" id="validationServer04" placeholder="state"  required>
                  <label for="floatingInput">State</label>
                  <label for="validationServer04" class="form-label"></label>
                   
              </div></div>
      
              <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer05" class="form-label"></label>
                  <input type="number" class="form-control " name="zipcode" id="validationServer05" placeholder="zip" required>
                  <label for="floatingInput">Zip Code</label>
                 
              </div></div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer06" class="form-label"></label>
                  <input type="email" class="form-control " name="email" id="validationServer06" placeholder="mail" required>
                  <label for="floatingInput">Email Address</label>
                </div></div>
                
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer07" class="form-label"></label>
                  <input type="password" class="form-control" name="password" id="validationServer07" placeholder="password" required>
                  <label for="floatingInput">Password</label>
                  </div>
                </div>
      
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer08" class="form-label"></label>
                  <input type="number" class="form-control" name="phone" id="validationServer08" placeholder="phone_no" required>
                  <label for="floatingInput">Phone number</label>
                  </div>
                </div>
      
                
          
             
                <div class="col-12">
                  
                </div>
                <div class="col-12">
                  <button class="w-100 btn btn-lg btn-success" type="submit" name="createaccount">Create Admin</button>
                </div>
              
              </form>
              </div></div>
              
            
          </article>
          </section>
          
          <!--End of Registration Form-->
          </div></div>

  







    
      <!-- END OF CONTENT -->
    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/dash.js"></script>
  </body>
</html>
