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

  searchbar.addEventListener('input', function (e) {
    var results;

    if (searchbar.value === '') {
      findAndUpdateState();
    } else {
      state.searchIsLoading = true;
      model.searchByKeywords(searchbar.value, function (res) {
        results = res;
        state.updateState(results);
        state.searchIsLoading = false;
      })
    }
  })

  document.addEventListener('onDataStateChanged', function (e) {
    view.updateDisplay(e.detail);
  })

  document.addEventListener('onStartUp', function (e) {
    findAndUpdateState();
  })

}());