<div id="sidebar">
  <div class="content">
    <div class="searchbar">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input class="search" type="text" placeholder="Search here...">
    </div>
    <ul class="options">
      <li>FILTERS</li>
      <hr>
      <li>
        <ul class="filters">
          <li>Date</li>
            <ul>
              <li class="sub-filter">
                <div class="right-icon drop" data-toggle="collapse" data-target="#months">
                  <div class="title">
                    Month
                  </div>
                  <span class="icon">
                    +
                  </span>
                </div>
              </li>
              <div id="months" class="collapse sub-dropdown">
                <ul>
                  <?php 
                    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

                    foreach ($months as $month) {
                      echo createFilterCheckbox($month);
                    }
                  ?>
                </ul>
              </div>
              <li class="sub-filter">
                <div class="right-icon drop" data-toggle="collapse" data-target="#years">
                  <div class="title">
                    Year
                  </div>
                  <span class="icon">
                    +
                  </span>
                </div>
              </li>
              <div id="years" class="collapse sub-dropdown">
                <ul>
                <?php 
                  $years = array('2013', '2014', '2015', '2016', '2017');

                  foreach ($years as $year) {
                    echo createFilterCheckbox($year);
                  }
                ?>
                </ul>
              </div>
            </ul>
          <li>Media Type</li>
          <div class="sub-dropdown">
            <ul>
              <?php 
                $mediaTypes = array('Images', 'Videos', 'Vectors', 'Miscellaneous');

                foreach ($mediaTypes as $type) {
                  echo createFilterCheckbox($type);
                }
              ?>
            </ul>
          </div>
          <li>Event Name</li>
          <li>Event Type</li>
        </ul>
      </li>
    </ul>
  </div>
</div>