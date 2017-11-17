<?php
  function readJSONFile($path) {
    $str = file_get_contents($path);
    $json = json_decode($str);
    return $json;
  }

  function readImageResponse($json) {
    $innerHtml = '';

    foreach ($json as $key => $value) {
      $innerHtml .= createImageCard($value['id'], $value['filepath']);
    }

    $innerHtml .= '<h1>hello</hi>';
    
    return $innerHtml;
  }

  function createImageCard($id, $filepath) {
    $card = '
    <div class="col-xl-3 col-lg-4 col-md-6 card-container">
      <div class="card">
        <div class="overlay">
          <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
          <i id="img-' . $id . '" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal" data-id="' . $id . '"></i>
        </div>
        <div class="crop">
          <a href="image.php?filepath=' . $filepath . '"><img class="card-img grow" src="' . $filepath . '" alt="Card image cap"></a>
        </div>
      </div>
    </div>';

    return $card;
  };

  function createFilterCheckbox($text) {
    $innerHtml = '
      <li>
        <div class="right-icon check">
          <span>' . $text . '</span>
          <input id="' . strtolower($text) . '-checkbox" type="checkbox" name="' . $text . '">
        </div>
      </li>';

    return $innerHtml;
  }
?>