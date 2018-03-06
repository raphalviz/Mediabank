"use strict";
var state = (function () {
  var state = {
    currentData: [],
    modalShowing: false,
    currentMedia: {},
    searchIsLoading: false
  };

  state.printState = function () {
    console.log(state.currentData);
  }

  state.updateState = function (results) {
    state.currentData = results;
    document.dispatchEvent(new CustomEvent('onDataStateChanged', { detail: state.currentData }));
  }

  state.editState = function (entry) {
    var indexToEdit = $.map(list, function(obj, index) {
      if(obj.MediaID == entry.MediaID) {
          return index;
      }
    })
    // TODO
  }

  state.clearState = function () {
    state.currentData = [];
    document.dispatchEvent(new CustomEvent('onDataStateCleared', { detail: {} }));
    document.dispatchEvent(new CustomEvent('onDataStateChanged', { detail: state.currentData }));
  }

  state.mediaOpened = function (mediaInfo) {
    state.modalShowing = true;
    state.currentMedia = mediaInfo;
  }

  state.mediaClosed = function () {
    state.modalShowing = false;
    state.currentMedia = {};
  }

  return state;
}());