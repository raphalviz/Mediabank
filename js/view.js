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

  return view;
})();