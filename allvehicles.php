<!-- Include the header  -->
<?php
    include('classes/DB.php');


    $recentSearches = "nav-link";
    $addAdmin = "nav-link";
    $addVehicle = "nav-link";
    $viewVehicle = "nav-link active";
    include('header.php');



    // If there is search 
    if(isset($_GET["reg_no"])){

      $dbposts = DB::query('SELECT * FROM cars WHERE cars.reg_no = :reg_no', array(':reg_no'=>$_GET["reg_no"]));
      $car_id = DB::query('SELECT id FROM cars WHERE  cars.reg_no = :reg_no', array(':reg_no'=>$_GET["reg_no"]))[0]['id'];

      DB::query('INSERT INTO recent_search VALUES (\'\', :cars_id, NOW())', array(':cars_id'=>$car_id));

    } else {
  
      $dbposts = DB::query('SELECT * FROM cars');

    }

    $posts = "";

 ?>




    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br> 
          <h2>View All Vehicles</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">First & Last Name</th>
                  <th scope="col">Reg. No.</th>
                  <th scope="col">Phone No.</th>
                  <th scope="col">Email</th>
                  <th scope="col">Photo</th>
                  <th scope="col">QR Code</th>
                  <th scope="col">License Expiration</th>
                  <th scope="col">Driver's License</th>
                  <th scope="col">Vehicle License</th>
                  
                </tr>
              </thead>
              <tbody>

              <!-- Loop through all data  -->
                  <?php
                    foreach($dbposts as $post) {
                    echo"
                          <tr>
                            <td> ".$post['firstname']."  ".$post['lastname']." </td>
                            <td> ".$post['reg_no']."</td>
                            <td> ".$post['phone']."</td>
                            <td> ".$post['email']."</td>
                            <td><img src=' ".$post['passport']."' width='50' height='50'></td>
                            <td><img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fhttp://127.0.0.1/car-records/allvehicles.php?reg_no=".$post['reg_no']."' width='50' height='50' ></td>
                            <td>".$post['license_exp']."</td>
                            <td><img src='".$post['drivers_license']."' width='50' height='50'></td>
                            <td><img src=".$post['car_license']." width='50' height='50'></td>
                          </tr>

                        ";
                    }

                  ?>



     <?php echo $posts; ?>


                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    
    
        <script src="assets/dist/js/bootstrap.bundle.js"></script>
    
          <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/dash.js"></script>
      </body>
    </html>
    
