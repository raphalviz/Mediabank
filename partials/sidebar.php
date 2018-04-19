<div id="sidebar">
  <div class="top-menu">
    <div class="home"><i class="fa fa-home" aria-hidden="true"></i></div>
    <div class="settings"><i class="fa fa-cog" aria-hidden="true"></i></div>
    <div class="upload">
      <div>
        <i class="fa fa-upload" aria-hidden="true"></i> 
        <span>UPLOAD</span>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="searchbar">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input id="side-searchbar" class="search" type="text" placeholder="Search here...">
    </div>
    <ul class="options">
      <li>FILTERS</li>
      <hr>
      <li>
        <ul class="filters">
          <li>Date</li>
            <ul>
              <!-- <li class="sub-filter">
                <div class="right-icon drop" data-toggle="collapse" data-target="#months">
                  <div class="title">Month</div>
                  <span class="icon">+</span>
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
              </div> -->
              <li class="sub-filter">
                <div class="right-icon drop" data-toggle="collapse" data-target="#years">
                  <div class="title">Year</div>
                  <span class="icon">+</span>
                </div>
              </li>
              <div id="years" class="collapse sub-dropdown">
                <ul id="years-list">
                <?php 
                  $years = array('2013', '2014', '2015', '2016', '2017');

                  foreach ($years as $year) {
                    echo createFilterCheckbox($year);
                  }
                ?>
                </ul>
              </div>
            </ul>
          <!-- <li>Media Type</li>
          <div class="sub-dropdown">
            <ul>
              <?php 
                $mediaTypes = array('Images', 'Videos', 'Vectors', 'Miscellaneous');

                foreach ($mediaTypes as $type) {
                  echo createFilterCheckbox($type);
                }
              ?>
            </ul>
          </div> -->
          <li>Event Name</li>
          <div class="sub-dropdown">
            <ul id="events-list">
            </ul>
          </div>
          <!-- <li>Event Type</li> -->
        </ul>
      </li>
    </ul>
  </div>
</div>