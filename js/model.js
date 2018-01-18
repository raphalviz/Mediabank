"use strict";
var model = (function () {
  var model = {};

  function debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this, args = arguments;
      var later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };

  var keywordSearch = function (keywords, callback) {
    var url = 'api/media/read.php';
    var query = '?method=keywords&keywords=' + keywords;

    url = url + query;

    $.get(url, function (res) {
      callback(res);
    })
  }

  model.searchByKeywords = debounce(keywordSearch, 250);

  model.findall = function (callback) {
    var url = 'api/media/read.php';
    var query = '?method=findall';

    url = url + query;

    $.get(url, function (res) {
      callback(res);
    })
  }

  return model;
})();