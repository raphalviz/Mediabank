"use strict";
var state = (function () {
  var state = {
    currentData: [],
    currentMedia: {},

    modalShowing: false,
    searchIsLoading: false,
    uploadFormShowing: false,

    yearsInState: {},
    yearsFiltered: {},

    eventsInState: {},
    eventsFiltered: {},

    filtersOn: false,
    filteredYearIds: [],
    filteredEventIds: [],
    filteredIds: [],
    filteredData: {}
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
    document.dispatchEvent(new CustomEvent('onEventsUpdated', { detail: state.eventsInState }));
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

  state.filterYear = function (year) {
    state.yearsFiltered[year] = state.yearsInState[year];
    state.filteredYearIds = state.filteredYearIds.concat(state.yearsFiltered[year]);

    updateFilteredIds();
    checkFilters();
    document.dispatchEvent(new CustomEvent('onYearFiltered', { detail: {} }));
  }

  state.unfilterYear = function (year) {
    state.filteredYearIds = state.filteredYearIds.filter(function (elem) {
      return state.yearsFiltered[year].indexOf(elem) < 0;
    })

    delete state.yearsFiltered[year];
    updateFilteredIds();
    checkFilters();
  }

  function getEventsInState() {
    var events = {};
    state.currentData.forEach(media => {
      if (events[media.EventID] == undefined) {
        events[media.EventID] = [media.MediaID];
      } else {
        events[media.EventID].push(media.MediaID);
      }
    });

    return events;
  }

  state.filterEvent = function (eid) {
    state.eventsFiltered[eid] = state.eventsInState[eid];
    state.filteredEventIds = state.filteredEventIds.concat(state.eventsFiltered[eid]);

    updateFilteredIds();
    checkFilters();
  }

  state.unfilterEvent = function (eid) {
    state.filteredEventIds = state.filteredEventIds.filter(function (elem) {
      return state.eventsFiltered[eid].indexOf(elem) < 0;
    })

    delete state.eventsFiltered[eid];
    updateFilteredIds();
    checkFilters();
  }

  function checkFilters() {
    if (state.filteredIds.length == 0) {
      state.filtersOn = false;
    } else {
      state.filtersOn = true;
    }

    console.log(state.filtersOn);
    return state.filtersOn;
  }

  function updateFilteredIds() {
    if (!state.filteredEventIds.length && state.filteredYearIds.length > 0) {
      state.filteredIds = state.filteredYearIds;
    } else if (!state.filteredYearIds.length && state.filteredEventIds.length > 0) {
      state.filteredIds = state.filteredEventIds;
    } else if (state.filteredEventIds.length > 0 && state.filteredYearIds.length > 0) {
      state.filteredIds = state.filteredEventIds.filter(function (elem) {
        return state.filteredYearIds.indexOf(elem) >= 0;
      })
    } else {
      state.filteredIds = [];
    }
    console.log(state.filteredIds);
    updateFilteredData();
  }

  function updateFilteredData() {
    state.filteredData = state.currentData.filter(function (media) {
      return state.filteredIds.indexOf(media.MediaID) >= 0;
    })

    console.log(state.filteredData);
    if (state.filteredEventIds.length > 0 || state.filteredYearIds.length > 0) {
      document.dispatchEvent(new CustomEvent('onFilteredData', { detail: { data: state.filteredData } }));
    } else {
      document.dispatchEvent(new CustomEvent('onUnfilteredData', { detail: state.currentData }));
    }
  }

  state.resetFilters = function () {
    state.eventsFiltered = {};
    state.yearsFiltered = {};
    state.filteredIds = [];
    state.filteredYearIds = [];
    state.filteredEventIds = [];
    state.filtersOn = false;
  }

  return state;
}());