<script src="js/lib/dropzone.js"></script>
<div id="upload-page">
  <div class="top-controls">
  </div>
  <div class="form-wrapper">
    <div id="previews" class="dropzone-previews">
      <div id="preview-header">
        <div class="header-wrapper">
          <h3 id="swag">Queue</h3>
          <span class="close" aria-hidden="true">&times;</span>
        </div>
        <!-- <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div> -->
      </div>
      <div id="preview-list">
        <form id="dropzone" action="#" method="POST" enctype="multipart/form-data" class="dropzone stitched">
          <i class="fa fa-upload" aria-hidden="true"></i>
          <!-- <input type="text" name="album"> -->
        </form>
        <div id="queue-previews"></div>
        <div id="upload-info">
          <div class="form-group">
            <label for="inputEvent">Event Name</label>
            <input type="text" class="form-control" id="inputEvent" aria-describedby="event" placeholder="Get Started">
            <small id="emailHelp" class="form-text text-muted">All queued files will be associated with this event.</small>
          </div>
          <div class="form-group">
            <label for="inputYear">Year</label>
            <input type="text" class="form-control" id="inputYear" aria-describedby="year" placeholder="2018">
          </div>
          <div>
            <label for="inputKeywords">Keywords</label>
            <input type="text" class="form-control" id="inputKeywords" aria-describedby="keywords" placeholder="Student, Fair, Outside">
            <small id="emailHelp" class="form-text text-muted">Separate keywords with a comma</small>
          </div>
          <button class="btn btn-primary btn-disabled" id="submit-dz" disabled>Begin Upload</button>
        </div>
      </div>
    </div>
  </div>
</div>