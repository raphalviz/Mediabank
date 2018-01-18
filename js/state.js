"use strict";
var state = (function () {
  var state = {
    currentData: []
  };

  state.printState = function () {
    console.log(state.currentData);
  }

  state.updateState = function (results) {
    state.currentData = results;
    document.dispatchEvent(new CustomEvent('onDataStateChange', { detail: state.currentData }));
  }

  return state;
}());