<?php

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


  // Get recent searches 
  $dbposts = DB::query('SELECT * FROM recent_searches');






?>


<!-- Include the header  -->
<?php
    $recentSearches = "nav-link active";
    $addAdmin = "nav-link ";
    $addVehicle = "nav-link";
    $viewVehicle = "nav-link";
    include('header.php');

 ?>





    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <br> 
      <h2>Last Searches</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Search Date</th>
              <th scope="col">Driver's Name</th>
              <th scope="col">Photo</th>
              <th scope="col">Reg. No.</th>
              <th scope="col">QR Code</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            <tr>
              <td>2/02/2022</td>
              <td>John Okafor</td>
              <td><img src="/assets/img/pass.jpeg" width="50" height="50" ></td>
              <td>AKY34FG</td>
              <td><img src="/assets/img/qr.png" width="50" height="50" ></td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="/assets/dist/js/bootstrap.bundle.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/dash.js"></script>
  </body>
</html>
