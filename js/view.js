"use strict";
var view = (function () {
  var view = {};

  var mediaGrid = document.getElementById('media-grid');
  var btnEdit = document.getElementById('edit-button');
  var btnDelete = document.getElementById('delete-button');
  var btnCancelEdit = document.getElementById('cancel-edit-button');
  var btnSaveEdit = document.getElementById('save-edit-button');

  var imageInfo = document.getElementById('image-modal-info');
  var imageEdit = document.getElementById('image-modal-edit');

  var inputEditEvent = document.getElementById('editEvent');
  var inputEditYear = document.getElementById('editYear');
  var inputEditKeywords = document.getElementById('editKeywords');

  var month = new Array();
  month[0] = "January";
  month[1] = "February";
  month[2] = "March";
  month[3] = "April";
  month[4] = "May";
  month[5] = "June";
  month[6] = "July";
  month[7] = "August";
  month[8] = "September";
  month[9] = "October";
  month[10] = "November";
  month[11] = "December";

  /**
   * Generates HTML for the thumbnails shown in the DOM
   * 
   * @param {string} id - string of id number representing a media
   * @param {string} path - path to media file
   * @returns {string} HTML for a media thumbnail
   */
  view.generateThumb = function (id, path) {
    var thumbPath = path.slice(0, 15) + 'thumbnails/' + path.slice(15, -4) + '_t' + path.slice(-4);

    var template = `
      <div class="col-xl-3 col-lg-4 col-md-6 card-container">
        <div class="card">
          <div class="overlay">
            <a href="${path}" download><i class="fa fa-download" aria-hidden="true"></i></a>
            <i id="img-${id}" class="fa fa-search" aria-hidden="true" data-toggle="modal" data-target="#image-modal" data-id="${id}"></i>
          </div>
          <div class="crop">
            <img class="card-img grow" src="${thumbPath}" alt="Card image cap">
          </div>
        </div>
      </div>
    `;

    return template;
  }

  /**
   * Puts together all the HTML for the thumbnails that are to be displayed
   * 
   * @param {array} data - has objects representing media
   * @return {string} Combined HTML of thumbnails for the entire display
   */
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

  /**
   * Hides elements that are visible and displays
   * elements that are not with mode displayMode
   * 
   * @param {iterable} elements
   * @param {string} displayMode 
   */
  var toggleShow = function (elements, displayMode) {
    elements.forEach(element => {
      if (element.style.display === 'none') {
        element.style.display = displayMode;
      } else {
        element.style.display = 'none';
      }
    });
  }

  var toggleShowEdit = function () {
    toggleShow([imageEdit, imageInfo], 'flex');
  }

  view.toggleShowEdit = toggleShowEdit;

  btnEdit.onclick = function () {
    toggleShowEdit();
  }

  btnCancelEdit.onclick = function () {
    toggleShowEdit();
  }

  // When magnifying glass on image is clicked:
  $('#image-modal').on('show.bs.modal', function (event) {
    var result;
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    var uploaded;

    result = $.grep(state.currentData, function (e) { return e.MediaID == id })[0];
    document.dispatchEvent(new CustomEvent('onModalShow', { detail: result }));
    uploaded = new Date(result['uploaded']);

    modal.css('display', 'flex !important');
    modal.find('.modal-img').attr('src', result['path']);
    modal.find('.dl-link').attr('href', result['path']);

    model.findEventById(result.EventID, function (res) {
      $('#info-title')[0].innerHTML = res.name;
      inputEditEvent.value = res.name;
    })
    inputEditYear.value = result['year'];
    inputEditKeywords.value = result['keywords'];
    $('#info-year')[0].innerHTML = result['year'];
    $('#upload-date')[0].innerHTML = month[uploaded.getMonth()] + " " + uploaded.getUTCDate() + ", " + uploaded.getFullYear();

    btnDelete.onclick = function () {
      document.dispatchEvent(new CustomEvent('onMediaDelete', { detail: result }))
    }

    btnSaveEdit.onclick = function () {
      var editedData = {
        event: inputEditEvent.value,
        year: inputEditYear.value,
        keywords: inputEditKeywords.value,
        MediaID: result['MediaID']
      }
      console.log("Following data has been sent: ", editedData);
      document.dispatchEvent(new CustomEvent('onEditSent', { detail: editedData }));
    }
  })

  $('#image-modal').on('hidden.bs.modal', function (event) {
    if (imageEdit.style.display != 'none') {
      toggleShow([imageEdit, imageInfo], 'flex');
    }
    document.dispatchEvent(new CustomEvent('onModalClose'), { detail: {} });
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