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
    state.resetFilters();
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

  document.addEventListener('onYearChecked', function (e) {
    var yearChecked = e.detail.year;
    state.filterYear(yearChecked);
  })

  document.addEventListener('onYearUnchecked', function (e) {
    var yearUnchecked = e.detail.year;
    state.unfilterYear(yearUnchecked);
  })

  document.addEventListener('onEventChecked', function (e) {
    var eventChecked = e.detail.eid;
    state.filterEvent(eventChecked);
  })

  document.addEventListener('onEventUnchecked', function (e) {
    var eventUnchecked = e.detail.eid;
    state.unfilterEvent(eventUnchecked);
  })

  document.addEventListener('onFilteredData', function (e) {
    var data = e.detail.data;
    console.log("From controller: ", data);
    view.updateDisplay(data);
  })

  document.addEventListener('onUnfilteredData', function (e) {
    var data = e.detail;
    view.updateDisplay(data);
  })

  document.addEventListener('onKeywordClicked', function (e) {
    var keyword = e.detail;
    console.log(keyword);
  })
}());