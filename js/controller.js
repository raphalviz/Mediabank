"use strict";
(function () {

  var searchbar = document.getElementById('side-searchbar');

  searchbar.addEventListener('input', function (e) {
    var results;
    model.searchByKeywords(searchbar.value, function (res) {
      results = res;
      state.updateState(results);
    });
  })

  document.addEventListener('onDataStateChange', function(e) {
    view.updateDisplay(e.detail);
  })

}());