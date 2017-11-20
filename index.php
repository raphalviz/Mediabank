<?php
  include "partials/header.php";
  include "partials/sidebar.php";
?>
  <div id="content">
    <div class="ct pictures">
      <div class="container">
        <div class="row justify-content-left infscroll">
          <?php 
            $json = readJSONFile('testdata.json');
            echo readImageResponse($json);
          ?>
        </div>
      </div>
    </div>
    <?php include "partials/upload-form.php"; ?>
  </div>
<?php 
  include "partials/image-modal.php";
  include "partials/footer.php";
?>