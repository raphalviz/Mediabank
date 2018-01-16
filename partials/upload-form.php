<script src="js/lib/dropzone.js"></script>
<div id="upload-page">
  <div class="top-controls">
    <span class="close" aria-hidden="true">&times;</span>
  </div>
  <div class="form-wrapper">
    <div id="previews" class="dropzone-previews">
      <div id="preview-header">
        <div class="header-wrapper">
          <h3 id="swag">Queue</h3>
          <button class="btn btn-primary" id="submit-dz">Begin Upload</button>
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
            <input type="text" class="form-control" id="inputEvent" aria-describedby="event" placeholder="Enter event name">
            <small id="emailHelp" class="form-text text-muted">All queued files will be associated with this event.</small>
          </div>
          <div class="form-group">
            <label for="inputEvent">Year</label>
            <input type="text" class="form-control" id="inputEvent" aria-describedby="event" placeholder="Enter year">
          </div>
          <div class="form-group">
            <label for="inputEvent">Keywords</label>
            <input type="text" class="form-control" id="inputEvent" aria-describedby="event" placeholder="Enter keywords">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>