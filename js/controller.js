"use strict";
(function () {

  var searchbar = document.getElementById('side-searchbar');

  document.onload = function (e) {
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
      model.searchByKeywords(searchbar.value, function (res) {
        results = res;
        state.updateState(results);
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