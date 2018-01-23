"use strict";
(function () {
  var displayedData;
  var postBody = {};
  var progress = 0;

  var toggleUploadPage = function () {
    var uploadPage = $('#upload-page');
    uploadPage.hasClass('active-upload') ? uploadPage.removeClass('active-upload') : uploadPage.addClass('active-upload');
  }

  $('div.top-menu > .upload, div.top-controls > .close').click(function (event) {
    toggleUploadPage();
  })

  Dropzone.options.dropzone = {
    addRemoveLinks: true,
    autoProcessQueue: false,
    maxFiles: 50,
    previewsContainer: '#queue-previews',
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
    url: 'partials/upload.php',

    init: function () {
      var dropzone = $('#dropzone');
      var uploadIcon = $('.fa-upload');
      var dzPrompt = $('.dz-message');

      var dzElements = { dropzone, uploadIcon, dzPrompt };

      var myDz = this;

      this.on('dragover', function () {
        view.dzAfter(dzElements);
      })

      this.on('dragleave', function () {
        view.dzBefore(dzElements);
      })

      this.on('drop', function () {
        view.dzBefore(dzElements);
      })

      this.on('removedfile', function () {
        if (this.files.length === 0) {
          dropzone.css('height', '100%');
        }
      })

      $('#submit-dz').on('click', function (e) {
        var eventName, eventYear, keywords;
        progress = 0;
        myDz.processQueue();

        // TODO: Get text inputs for info and then send POST request
        eventName = document.getElementById('inputEvent').value;
        eventYear = document.getElementById('inputYear').value;
        keywords = document.getElementById('inputKeywords').value;

        postBody['event'] = eventName;
        postBody['year'] = eventYear;
        postBody['keywords'] = keywords;
      })

      this.on('success', function (file, response) {
        myDz.processQueue();

        var filepath = response;

        postBody['path'] = $.parseJSON(filepath);

        if ((/\.(gif|jpg|jpeg|tiff|png)$/i).test(postBody['path']) === true) {
          postBody['type'] = "image";
        }

        $.post('api/media/create.php', postBody, function (res) {
          console.log(res);
        })
      })

      this.on('totaluploadprogress', function (response) {
        progress <= response ? progress = response : progress;
        console.log(progress);
        // $('.progress-bar').width(progress + '%');
      })

      this.on('addedfile', function () {
        $('#submit-dz').css('display', 'block');
      })
    }
  }
})()
