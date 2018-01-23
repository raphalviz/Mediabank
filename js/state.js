"use strict";
var state = (function () {
  var state = {
    currentData: [],
    searchIsLoading: false
  };

  state.printState = function () {
    console.log(state.currentData);
  }

  state.updateState = function (results) {
    state.currentData = results;
    document.dispatchEvent(new CustomEvent('onDataStateChanged', { detail: state.currentData }));
  }

  state.clearState = function () {
    state.currentData = [];
    document.dispatchEvent(new CustomEvent('onDataStateCleared', { detail: {} }));
    document.dispatchEvent(new CustomEvent('onDataStateChanged', { detail: state.currentData }));
  }

  return state;
}());