<?php
  include "partials/header.php";
  include "partials/sidebar.php";
?>
  <div id="content">
    <div class="ct pictures">
      <div class="container">
        <div id="media-grid" class="row justify-content-left infscroll">
        </div>
      </div>
    </div>
    <?php include "partials/upload-form.php"; ?>
  </div>
<?php 
  include "partials/image-modal.php";
  // TODO: Progress bar
  // include "partials/progress.php";
  include "partials/footer.php";
?>