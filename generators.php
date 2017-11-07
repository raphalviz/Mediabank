<?php 
  function createImageCard($id, $filepath) {
    $card = '
    <div class="col-xl-3 col-lg-4 col-md-4">
      <div class="card">
        <div class="overlay">
          <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
        </div>
        <div class="crop">
          <a href="image.php?filepath=' . $filepath . '"><img class="card-img grow" src="' . $filepath . '" alt="Card image cap"></a>
        </div>
      </div>
    </div>';

    return $card;
  };
?>