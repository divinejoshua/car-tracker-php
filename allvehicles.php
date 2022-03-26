<!-- Include the header  -->
<?php
    $recentSearches = "nav-link";
    $addAdmin = "nav-link";
    $addVehicle = "nav-link";
    $viewVehicle = "nav-link active";
    include('header.php');

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
                <tr>
                    <td>john Okafor</td>
                    <td>AKY34FG</td>
                    <td>07089505236</td>
                    <td>testing@gmail.com</td>
                    <td><img src="assets/img/pass.jpeg" width="50" height="50" ></td>
                    <td><img src="assets/img/qr.png" width="50" height="50" ></td>
                    <td>23/07/2025</td>
                    <td><img src="assets/img/lic.jpeg" width="50" height="50" ></td>
                    <td><img src="assets/img/carlic.jpeg" width="50" height="50" ></td>
                  </tr>
                
                  <?php
                      $dbposts = DB::query('SELECT posts.id, posts.body, users.username FROM posts, users
                      WHERE users.id = posts.user_id
                      AND reciever_id=:userid
                      ORDER BY id DESC', array(':userid'=>$userid));
                      $posts = "";
                      $number = count($dbposts);
                      foreach($dbposts as $p) {
                      $posts .= "
                                      <div class='sl-item'>
                                                <div class='sl-left'> <img src='../assets/images/users/avatar.png' alt='user' class='img-circle'> </div>
                                                <div class='sl-right'>
                                                    <div><h6><font color ='#1e88e5'<a href='javascript:void(0)' class='link'>@Truetalker</font></a> <span class='sl-date'> minutes ago</span></h6>
                                                        <p class='m-t-10'>";

                                                         $posts .= htmlspecialchars($p['body'])." </p>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <hr>

    
                        ";
                }

?>
   

                
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
    
