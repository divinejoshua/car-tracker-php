<?php 
include('classes/DB.php');

$_SESSION['message'] = '';
if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email))[0]['password'])) {
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 70, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                        echo "<script>window.open('dash.php', '_self')</script>";


                } else {
                         $_SESSION['message'] = "<font color='#F44336'>*Incorrect Password !!!</font>";
                }

        } else {
                $_SESSION['message'] = "<font color='#F44336'>Email not found</font>";
        }

}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="joel omoroje">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login VR-Records</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

        <!-- FIXED NAVBAR HEADER -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.htm">Back</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
             </ul>
              </div></div></nav>
         <!--End of navbar-->

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="login.php" method="post">
    <h2> VR-Records</h2>
    <center><p class="font col-red"><?= $_SESSION['message'] ?></p></center>
    <h1 class="h6 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword"  name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
      <button class="w-100 btn btn-lg btn-success" type="submit" name="login">Sign in</button>
    <p class="mt-5 mb-3 text-muted">developed by <a href="https://instagram.com/trayon_dmn">Trayon</a> &copy 2022 </p>
  </form>
</main>


    
  </body>
</html>
