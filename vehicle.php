<?php
include('classes/DB.php');
$_SESSION['message'] = '';
if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $vehiclename = $_POST['vehiclename'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $license_exp = $_POST['license_exp'];
        $reg_no = $_POST['reg_no'];

        // Declear mysqli 
        $mysqli = new mysqli('localhost', 'root', '', 'car_record');

        // The files 
        $drivers_license = $mysqli->real_escape_string('img/post/'.$_FILES['drivers_license']['name']); 
        $car_license = $mysqli->real_escape_string('img/post/'.$_FILES['car_license']['name']); 
        $passport = $mysqli->real_escape_string('img/post/'.$_FILES['passport']['name']); 


        // For file upload 

        if (copy($_FILES['drivers_license']['tmp_name'], $drivers_license)) {

          
          if (copy($_FILES['car_license']['tmp_name'], $car_license)) {
            

            if (copy($_FILES['passport']['tmp_name'], $passport)) {




        // Validations   

        // if reg_no exist 
        if (!DB::query('SELECT reg_no FROM cars WHERE reg_no=:reg_no', array(':reg_no'=>$reg_no))) {

     

              // Insert into database 
              DB::query('INSERT INTO cars VALUES (\'\',  :firstname,  :lastname,  :vehiclename, :city, :state, :zipcode,  :email, :phone, :license_exp, :reg_no, :drivers_license, :car_license, :passport)', 
            
              array(':firstname'=>$firstname, ':lastname'=>$lastname, ':vehiclename'=>$vehiclename, ':city'=>$city, ':state'=>$state, ':zipcode'=>$zipcode, ':email'=>$email, ':phone'=>$phone, ':license_exp'=>$license_exp, ':reg_no'=>$reg_no, ':drivers_license'=>$drivers_license, ':car_license'=>$car_license, ':passport'=>$passport)); 
              

              $_SESSION['message'] = "<font color='green'>*Added successfully</font>";

                

            } else {
                    $_SESSION['message'] = "<font color='#F44336'>*Registration number is already in use !!!</font>";
            }


          } else {
            $_SESSION['message'] = "<font color='#F44336'>*Passport not uploaded !!!</font>";
        }

      } else {
        $_SESSION['message'] = "<font color='#F44336'>*Car license not uploaded !!!</font>";
    }

  } else {
    $_SESSION['message'] = "<font color='#F44336'>*Driver's license not uploaded !!!</font>";
}

}

// get logged in user 
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


<!-- Include the header  -->
<?php
    $recentSearches = "nav-link";
    $addAdmin = "nav-link ";
    $addVehicle = "nav-link active";
    $viewVehicle = "nav-link ";
    include('header.php');

 ?>




    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Vehicle</h1>
        <p class="font"><?= $_SESSION['message'] ?></p>
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
      </div>



    <!--content-->
    <main class="form-reg">
      <center><br>
            
              <h1 class="h6 mb-3 fw-normal">Register New vehicle</h1>
          </center>
      
           <article class="my-3" id="validation">
              <div class="bd-example">
              <form class="row g-3"  action="vehicle.php" method="post"  enctype="multipart/form-data">
          
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" class="form-control " id="validationServer01" placeholder="first name" name="firstname"  required>
                  <label for="validationServer01" class="form-label"> </label>
                  <label for="floatingInput">Driver First Name</label>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer02" class="form-label"></label>
                  <input type="text" class="form-control " id="validationServer02" placeholder="last name" name="lastname" required>
                  <label for="floatingInput">Driver Last Name</label>
              </div>
                </div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServerUsername" class="form-label"></label>
                  <input type="text" class="form-control " id="validationServerUsername" placeholder="username" name="vehiclename" required>
                  <label for="floatingInput">Name of Vehicle</label>
              </div>
                </div>
             
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer03" class="form-label"></label>
                  <input type="text" class="form-control " id="validationServer03" placeholder="city" name="city" required>
                  <label for="floatingInput">City</label>
                </div></div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <input type="text" class="form-control " id="validationServer04" placeholder="state" name="state" required>
                  <label for="floatingInput">State</label>
                  <label for="validationServer04" class="form-label"></label>
                   
              </div></div>
      
              <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer05" class="form-label"></label>
                  <input type="number" class="form-control " id="validationServer05" placeholder="zip" name="zipcode" required>
                  <label for="floatingInput">Zip Code</label>
                 
              </div></div>
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer06" class="form-label"></label>
                  <input type="email" class="form-control " id="validationServer06" placeholder="mail" name="email" required>
                  <label for="floatingInput">Driver Email Address</label>
                </div></div>
                
             
      
      
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer08" class="form-label"></label>
                  <input type="number" class="form-control" id="validationServer08" placeholder="phone_no" name="phone" required>
                  <label for="floatingInput">Driver Phone number</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer09" class="form-label"></label>
                  <input type="date" class="form-control " id="validationServer09" placeholder="license_exp" name="license_exp" required>
                  <label for="floatingInput">Driver's License Expiration</label>
                 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <label for="validationServer09" class="form-label"></label>
                  <input type="text" class="form-control " id="validationServer09" placeholder="reg_no" name="reg_no" required>
                  <label for="floatingInput">Car Registration Number</label>
                 
                  </div>
                </div>
      
              
                <div class="mb-3">
                  <div class="form-floating">
                  <label class="form-label" for="validationServer10"> </label>
                  <label class="form-check-label" for="invalidCheck3">
                      Upload Driver's License
                    </label><br><br>
                  <input type="file" class="form-control" id="validationServer10" placeholder="driver_license" name="drivers_license" required>
                  </div>
                </div>
          
                <div class="mb-3">
                  <div class="form-floating">
                  <label class="form-label" for="validationServer11"></label>
                  <label class="form-check-label" for="invalidCheck3">
                      Upload Car License
                    </label><br><br>
                  <input type="file" class="form-control" id="validationServer11" placeholder="car_license" name="car_license" required>
                    </div>
                </div>
          
                <div class="mb-3">
                  <div class="form-floating">
                  <label class="form-label" for="validationServer12"></label>
                  <label class="form-check-label" for="invalidCheck3">
                      Upload Passport Photo
                    </label><br><br>
                  <input type="file" class="form-control" id="validationServer12" placeholder="photo" name="passport" required>
                 
                  </div>
                </div>
          
             
                
                <div class="col-12">
                  <button class="w-100 btn btn-lg btn-success" type="submit" name="submit">Add Now</button>
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
