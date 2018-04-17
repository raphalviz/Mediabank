"use strict";
(function () {

  var searchbar = document.getElementById('side-searchbar');

  window.onload = function (e) {
    view.startupDisplay();
  }

  var findAndUpdateState = function () {
    model.findall(function (res) {
      state.updateState(res);
    })
  }

  // Called when text in searchbar changes
  searchbar.addEventListener('input', function (e) {
    var results;

    state.searchIsLoading = true;
    model.searchByKeywords(searchbar.value, function (res) {
      results = res;
      state.updateState(results);
      state.searchIsLoading = false;
    })
  })

  document.addEventListener('onDataStateChanged', function (e) {
    view.updateDisplay(e.detail);
  })

  document.addEventListener('onStartUp', function (e) {
    findAndUpdateState();
  })

  // document.addEventListener('onUploadSuccess', function (e) {
  //   model.createMediaEntry(e.detail);
  // })
  document.addEventListener('onUploadSuccess', function (e) {
    model.createMediaEntries(e.detail);
  })

  document.addEventListener('onModalShow', function (e) {
    state.mediaOpened(e.detail);
  })

  document.addEventListener('onModalClose', function (e) {
    state.mediaClosed();
  })

  document.addEventListener('onEditSent', function (e) {
    model.updateMediaEntry(e.detail);
  })

  document.addEventListener('onEditSuccess', function (e) {
    view.toggleShowEdit();
    // TODO
  })

  document.addEventListener('onMediaDelete', function (e) {
    model.deleteMedia(e.detail['MediaID']);
  })

  document.addEventListener('onYearsUpdated', function (e) {
    view.updateYearFilters(e.detail);
  })

  document.addEventListener('onEventsUpdated', function (e) {
    view.generateEventCheckbox(e.detail);
  })
}());