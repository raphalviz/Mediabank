"use strict";
(function () {
  var displayedData;
  var postBody = {};
  var postArray = [];
  var progress = 0;

  var toggleUploadPage = function () {
    var uploadPage = $('#upload-page');
    uploadPage.hasClass('active-upload') ? uploadPage.removeClass('active-upload') : uploadPage.addClass('active-upload');
  }

  $('div.top-menu > .upload, div.header-wrapper > .close').click(function (event) {
    toggleUploadPage();
  })

  var resetToastr = function () {
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  }

  resetToastr();

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
        postArray = [];
        var eventName, eventYear, keywords;
        progress = 0;
        myDz.processQueue();

        $('#submit-dz').prop('disabled', true);
        $('#submit-dz').addClass('btn-disabled');

        // TODO: Get text inputs for info and then send POST request
        eventName = document.getElementById('inputEvent').value;
        eventYear = document.getElementById('inputYear').value;
        keywords = document.getElementById('inputKeywords').value;

        postBody['event'] = eventName;
        postBody['year'] = eventYear;
        postBody['keywords'] = keywords + " " + eventName;

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-bottom-left",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "0",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }

        toastr.info("Upload in Progress...", "0%");
      })

      this.on('success', function (file, response) {
        myDz.processQueue();

        var filepath = response;
        console.log(filepath);
        postBody['path'] = $.parseJSON(filepath);

        if ((/\.(gif|jpg|jpeg|tiff|png)$/i).test(postBody['path']) === true) {
          postBody['type'] = "image";
        }

        var newBody = {
          event: postBody['event'],
          year: postBody['year'],
          keywords: postBody['keywords'],
          path: postBody['path'],
          type: postBody['type']
        }
        // document.dispatchEvent(new CustomEvent('onUploadSuccess', { detail: postBody }));
        postArray.push(newBody);
        this.removeFile(file);
      })

      this.on('totaluploadprogress', function (response) {
        progress <= response ? progress = response : progress;
        console.log(progress);
        var toastTitle = $('.toast-title')[0];

        $('.toast-title')[0].innerHTML = "Upload in Progress..."
        $('.toast-message')[0].innerHTML = parseInt(progress) + '%';
        // $('.progress-bar').width(progress + '%');
      })

      this.on('addedfile', function () {
        $('#submit-dz').prop('disabled', false);
        $('#submit-dz').removeClass('btn-disabled');
      })

      this.on('queuecomplete', function () {
        toastr.clear();
        document.dispatchEvent(new CustomEvent('onUploadSuccess', { detail: postArray }));
        toggleUploadPage();
        resetToastr();
        toastr.success('Success!', 'Your upload has completed.');
      })
    }
  }
})()
