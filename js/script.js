// $('.infscroll').infiniteScroll({
//   path: 'page.html',
//   append: '.card-container',
//   history: false,
// });

$('#image-modal').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget);
  var id = button.data('id')
  var modal = $(this);
  modal.find('.modal-img').attr('src', 'images/test' + id + '.jpg');
})