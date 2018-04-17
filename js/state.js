"use strict";
var state = (function () {
  var state = {
    currentData: [],
    modalShowing: false,
    currentMedia: {},
    searchIsLoading: false,
    uploadFormShowing: false,
    yearsInState: {},
    yearsFiltered: {},
    eventsInState: {},
    eventsFiltered: {},
    filtersOn: false,
    filteredData: []
  };

  state.printState = function () {
    console.log(state.currentData);
  }

  state.updateState = function (results) {
    state.currentData = results;
    document.dispatchEvent(new CustomEvent('onDataStateChanged', { detail: state.currentData }));
    state.yearsInState = getYearsInState();
    document.dispatchEvent(new CustomEvent('onYearsUpdated', { detail: state.yearsInState }));
    state.eventsInState = getEventsInState();
    document.dispatchEvent(new CustomEvent('onEventsUpdated', { detail: state.eventsInState}));
  }

  state.editState = function (entry) {
    var indexToEdit = $.map(list, function (obj, index) {
      if (obj.MediaID == entry.MediaID) {
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

  function getYearsInState() {
    var years = {}
    state.currentData.forEach(media => {
      if (years[media.year] == undefined) {
        years[media.year] = [media.MediaID];
      } else {
        years[media.year].push(media.MediaID);
      }
    });

    return years;
  }

  function filterYear(year) {
    state.yearsFiltered[year] = state.yearsInState[year];
    document.dispatchEvent(new CustomEvent('onYearFiltered', { detail: {} }))
  }

  function unfilterYear(year) {
    delete state.yearsFiltered[year];
  }

  function getEventsInState() {
    var events = {}
    state.currentData.forEach(media => {
      if (events[media.EventID] == undefined) {
        events[media.EventID] = [media.MediaID];
      } else {
        events[media.EventID].push(media.MediaID);
      }
    });

    return events;
  }

  return state;
}());