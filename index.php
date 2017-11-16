<?php
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
                <i id="img-1" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal" data-id="1"></i>
              </div>
              <div class="crop">
                <img class="card-img grow" src="images/test1.jpg" alt="Card image cap">
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 card-container">
            <div class="card">
              <div class="overlay">
                <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                <i id="img-2" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal" data-id="2"></i>
              </div>
              <div class="crop">
                <a href="image.php"><img class="card-img grow" src="images/test2.jpg" alt="Card image cap"></a>
              </div>
            </div>
          </div>
          <?php 
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
<?php 
  include "partials/image-modal.php";
  include "partials/footer.php";
?>