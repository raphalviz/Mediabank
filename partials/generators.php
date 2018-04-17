<?php
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