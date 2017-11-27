"use strict";
(function() {
  var displayedData;

  var toggleUploadPage = function () {
    var uploadPage = $('#upload-page');
    uploadPage.hasClass('active-upload') ? uploadPage.removeClass('active-upload') : uploadPage.addClass('active-upload');
  }

  $('#image-modal').on('show.bs.modal', function (event) {
    var result;
    var button = $(event.relatedTarget);
    var id = button.data('id')
    var modal = $(this);
  
    $.getJSON('testdata.json', function (data) {
      result = $.grep(data, function (e) {return e.id == id})[0];
      console.log(result)
      modal.find('.modal-img').attr('src', result['filepath']);
    })
  })

  $('div.top-menu > .upload, div.top-controls > .close').click(function (event) {
    toggleUploadPage();
  })

  Dropzone.options.dropzone = {
    addRemoveLinks: true,
    previewsContainer: '#preview-list',
    previewTemplate: `
      <div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <div class="dz-filename flex-align"><span data-dz-name></span></div>
          <div class="dz-size flex-align" data-dz-size></div>
          <img data-dz-thumbnail />
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <!--<div class="dz-success-mark"><span>✔</span></div>
        <div class="dz-error-mark"><span>✘</span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>-->
      </div>
    `,

    init: function () {
      var dropzone = $('#dropzone');
      var uploadIcon = $('.fa-upload');
      var dzPrompt = $('.dz-message');

      this.on('dragover', function () {
        dropzone.css('border', '2px dashed #3eadf9');
        dropzone.css('background-color', '#bfeaff');
        uploadIcon.css('color', '#3eadf9');
        uploadIcon.addClass('important-size-i');
        dzPrompt.css('color', '#3eadf9');
        dzPrompt.addClass('important-size-prompt');
      })
      
      this.on('dragleave', function () {
        dropzone.css('border', '2px dashed #a8a8a8');
        dropzone.css('background-color', 'white');
        uploadIcon.css('color', '#a8a8a8');
        uploadIcon.removeClass('important-size-i');
        dzPrompt.css('color', '#a8a8a8');
        dzPrompt.removeClass('important-size-prompt');
      })
      
      this.on('drop', function () {
        dropzone.css('border', '2px dashed #a8a8a8');
        dropzone.css('background-color', 'white');
        uploadIcon.css('color', '#a8a8a8');
        uploadIcon.removeClass('important-size-i');
        dzPrompt.css('color', '#a8a8a8');
        dzPrompt.removeClass('important-size-prompt');
      })

      this.on('addedfile', function () {
        dropzone.css('height', '12%');
      })
      
      this.on('removedfile', function () {
        if (this.files.length === 0) {
          dropzone.css('height', '100%');
        }
      })
    }
  }
})()
