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
          <button id="submit-dz">Begin Upload</button>
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
      </div>
    </div>
  </div>
</div>