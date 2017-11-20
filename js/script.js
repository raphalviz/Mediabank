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
})()
