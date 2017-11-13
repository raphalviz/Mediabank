<? 
  include "partials/header.php";
?>
      <div id="content">
        <div class="ct pictures">
          <div class="container">
            <div class="row justify-content-left infscroll">
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                    <a href="image.php"><i class="fa fa-search" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <img class="card-img grow" src="images/testimg.jpg" alt="Card image cap">
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test2.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test3.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test4.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test5.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test6.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test7.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test2.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test3.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test4.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test5.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test6.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                  </div>
                  <div class="crop">
                    <a href="image.php"><img class="card-img grow" src="images/test7.jpg" alt="Card image cap"></a>
                  </div>
                </div>
              </div>
              <?php 
                echo createImageCard(1, "images/testimg.jpg");

                for ($i = 2; $i < 10; $i++) {
                  echo createImageCard($i, "images/test" . $i . ".jpg");
                }
                for ($i = 2; $i < 10; $i++) {
                  echo createImageCard($i, "images/test" . $i . ".jpg");
                }

              ?>
            </div>
          </div>
        </div>
      </div>
<?php include "partials/footer.php" ?>