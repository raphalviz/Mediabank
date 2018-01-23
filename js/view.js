"use strict";
var view = (function () {
  var view = {};

  var mediaGrid = document.getElementById('media-grid');

  view.generateThumb = function (id, path) {
    path = path.slice(0, 15) + 'thumbnails/' + path.slice(15, -4) + '_t' + path.slice(-4);

    var template = `
      <div class="col-xl-3 col-lg-4 col-md-6 card-container">
        <div class="card">
          <div class="overlay">
            <a href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
            <i id="img-${id}" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal" data-id="${id}"></i>
          </div>
          <div class="crop">
            <img class="card-img grow" src="${path}" alt="Card image cap">
          </div>
        </div>
      </div>
    `;

    return template;
  }

  view.generateDisplay = function (data) {
    var template = ``;
    data.forEach(media => {
      template += view.generateThumb(media.MediaID, media.path);
    });
    return template;
  }

  view.updateDisplay = function (data) {
    var template = view.generateDisplay(data);
    mediaGrid.innerHTML = template;
  }

  view.startupDisplay = function () {
    state.clearState();
    document.dispatchEvent(new CustomEvent('onStartUp', { detail: {} }));
  }

  // When magnifying glass on image is clicked:
  $('#image-modal').on('show.bs.modal', function (event) {
    var result;
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);

    result = $.grep(state.currentData, function (e) { return e.MediaID == id })[0];
    modal.find('.modal-img').attr('src', result['path']);
  })

  // Dropzone styles for events
  view.dzBefore = function (e) {
    e.dropzone.css('border', '2px dashed #a8a8a8');
    e.dropzone.css('background-color', 'white');
    e.uploadIcon.css('color', '#a8a8a8');
    e.uploadIcon.removeClass('important-size-i');
    e.dzPrompt.css('color', '#a8a8a8');
    e.dzPrompt.removeClass('important-size-prompt');
  }

  view.dzAfter = function (e) {
    e.dropzone.css('border', '2px dashed #3eadf9');
    e.dropzone.css('background-color', '#bfeaff');
    e.uploadIcon.css('color', '#3eadf9');
    e.uploadIcon.addClass('important-size-i');
    e.dzPrompt.css('color', '#3eadf9');
    e.dzPrompt.addClass('important-size-prompt');
  }
  
  return view;
})();