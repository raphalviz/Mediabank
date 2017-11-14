<? 
  include "partials/header.php";
  include "partials/sidebar.php";
?>
      <div id="content">
        <div class="ct pictures">
          <div class="container">
            <div class="row justify-content-left infscroll">
              <div class="col-xl-3 col-lg-4 col-md-6 card-container">
                <div class="card">
                  <div class="overlay">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <i id="img-1" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal"></i>
                  </div>
                  <div class="crop">
                    <img class="card-img grow" src="images/testimg.jpg" alt="Card image cap">
                  </div>
                </div>
              </div>
              <!-- <div class="col-xl-3 col-lg-4 col-md-6 card-container">
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

              ?> -->
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="ImageModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 image-big">
                    <img src="images/testimg.jpg" alt="">
                  </div>
                  <div class="col-md-3 image-info">
                    <div>
                      <div class="corner-opt">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div id="info-content">
                      </div>
                    </div>
                    <div id="opt-buttons">
                      <button type="button" class="btn btn-primary btn-dl"><i class="fa fa-download" aria-hidden="true"></i>DOWNLOAD</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include "partials/footer.php" ?>