"use strict";
var model = (function () {
  var model = {};

  /* Debouncer for functions */
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

  /** 
   * Finds media given keywords.  Triggered from search bar in the view
   * 
   * @param {string} keywords - Words to look for in the tags column in db
   * @param {function} callback
   */
  var keywordSearch = function (keywords, callback) {
    var url = 'api/media/read.php';
    var query = '?method=keywords&keywords=' + keywords;

    url = url + query;

    $.get(url, function (res) {
      callback(res);
    })
  }

  /* Debounce to reduce requests made to server and changes to the DOM */
  model.searchByKeywords = debounce(keywordSearch, 250);

  /** 
   * Find all media (Limit found in api).
   * Returns array of JSON where each JSON represents a specific media file
   * 
   * @param {function} callback
   */
  model.findall = function (callback) {
    var url = 'api/media/read.php';
    var query = '?method=findall';

    $.get(url + query, function (res) {
      callback(res);
    })
  }

  /** 
   * Check if an event with name eventName already exists, if it doesn't then create it 
   * otherwise return the ID of the event 
   * 
   * @param {string} eventName
   * @param {function} callback
   */
  var checkEvent = function (eventName, callback) {
    $.get('api/events/read.php?method=searchByName&name=' + eventName, function (response) {
      var exists = response.length === 0 ? false : true;
      if (!exists) {
        $.post('api/events/create.php', { 'name': eventName }, function (res) {
          callback(res);
        })
      } else {
        callback(response[0].EventID);
      }
    })
  }

  /**
   * Searches the events table for an entry with corresponding ID
   * 
   * @param {string} eid - Stringified integer that corresponds to an event's ID
   * @param {function} callback
   */
  model.findEventById = function (eid, callback) {
    var url = 'api/events/read.php';
    var query = '?method=findbyid&id=' + eid;
    $.get(url + query, function (response) {
      callback(response);
    })
  }

  /**
   * Calls to the api to create a new media entry in the media table
   * 
   * @param {object} postBody - The body of the post request
   */
  model.createMediaEntry = function (postBody) {
    checkEvent(postBody['event'], function (EventID) {
      postBody.EventID = EventID;
      $.post('api/media/create.php', postBody, function (res) {
        console.log(res);
      })
    });
  }

  return model;
})();