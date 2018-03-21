<div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="ImageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-12 image-big">
              <img class="modal-img" src="" alt="">
            </div>
            <div class="col-lg-3 col-md-12">
              <!-- Default display -->
              <div id="image-modal-info" class="image-info">
                <div>
                  <div class="corner-opt">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div id="info-content">
                    <h4 id="info-title">Random Event</h4>
                    <h5 id="info-year" class="year">2017</h5>
                    <div class="option-btns">
                      <button id="edit-button" type="button" class="btn btn-secondary btn-short btn-edit"><i class="fa fa-edit"></i>EDIT</button>
                      <button id="delete-button" type="button" class="btn btn-danger btn-short"><i class="fa fa-trash"></i></button>
                    </div>
                    <div id="sub-info-content">
                      <i class="fa fa-calendar-plus-o modal-icons" aria-hidden="true"></i><span id="upload-date">January 24, 2018</span>
                      <br>
                      <i class="fa fa-users modal-icons" aria-hidden="true"></i><span id="people-tagged">people</span>
                    </div>
                    <!-- Delete confirmation -->
                    <div id="image-modal-delete">
                      <span>Permanently delete file?</span>
                      <div class="delete-btn-group">
                        <button id="confirm-delete-btn" class="btn btn-danger btn-short">Delete</button>
                        <button id="cancel-delete-btn" class="btn btn-secondary btn-short">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="opt-buttons">
                  <a class="dl-link" href="" download>
                    <button type="button" class="btn btn-primary btn-dl"><i class="fa fa-download" aria-hidden="true"></i>Download</button>
                  </a>
                </div>
              </div>
              <!-- Edit display -->
              <div id="image-modal-edit" class="edit-container" style="display: none;">
                <div class="form-group">
                  <div class="corner-opt">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="edit-form" action="">
                    <div class="form-group">
                      <label for="editEvent">Event</label>
                      <input id="editEvent" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                      <label for="editYear">Year</label>
                      <input id="editYear" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                      <label for="editKeywords">Keywords</label>
                      <textarea id="editKeywords" class="form-control" name="" id="" cols="30" rows="3" style="resize: none;"></textarea>
                    </div>
                  </form>
                </div>
                <div id="edit-buttons">
                  <button id="save-edit-button" ype="button" class="btn btn-primary btn-save"><i class="fa fa-save" aria-hidden="true"></i>Save</button>
                  <button id="cancel-edit-button" type="button" class="btn btn-secondary">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>