/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
$(document).ready(function () {
  var serial_value = '';
  var serial_data = '';
  $("#o--tasks").hide();
  $("#o--info").hide();
  $(document).ready(function () {
    $('#serials-table').DataTable({
      language: {
        processing: "Traitement en cours ...",
        search: "Rechercher&nbsp;:&nbsp;",
        lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
        zeroRecords: "Aucun r&eacture;sultat",
        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        paginate: {
          first: "Première page",
          previous: "Pr&eacute;c&eacute;dent",
          next: "Suivant",
          last: "Dernière page"
        },
        emptyTable: "Aucune donn&eacute;e dans le tableau"
      }
    });
    $('#fleet-table').DataTable({
      language: {
        processing: "Traitement en cours ...",
        search: "Rechercher&nbsp;:&nbsp;",
        lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
        zeroRecords: "Aucun r&eacture;sultat",
        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        paginate: {
          first: "Première page",
          previous: "Pr&eacute;c&eacute;dent",
          next: "Suivant",
          last: "Dernière page"
        },
        emptyTable: "Aucune donn&eacute;e dans le tableau"
      }
    });
    $('#dealers-table').DataTable({
      language: {
        processing: "Traitement en cours ...",
        search: "Rechercher&nbsp;:&nbsp;",
        lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
        zeroRecords: "Aucun r&eacture;sultat",
        info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        paginate: {
          first: "Première page",
          previous: "Pr&eacute;c&eacute;dent",
          next: "Suivant",
          last: "Dernière page"
        },
        emptyTable: "Aucune donn&eacute;e dans le tableau"
      }
    });
  });
  $("#serial-checker").on('input', function (e) {
    serial_value = e.target.value;

    if (serial_value.length >= 8) {
      $.ajax({
        type: 'GET',
        url: 'http://fleetmanager.mac/api/serials/search/' + serial_value,
        success: function success(data) {
          serial_data = data;

          if (!$.isEmptyObject(serial_data)) {
            if (serial_data.status == "available") {
              $("#serial-info").html('<div class="flatnotification flatnotification-primary">"Vous devez d\'abord <a href="#">enregistrer ce vélo</a> avant mise en circulation.</div>');
            } else {
              $("#serial-info").html('<div class="flatnotification flatnotification-success">Nous recherchons les révisions existantes pour ce vélo ...</div>');
              $("#o--tasks").fadeIn();
            }
          } else {
            $("#serial-info").html('<div class="flatnotification flatnotification-destroy">Le numéro de série n\'a pas été reconnu.</div>');
          }
        }
      });
    } else {
      $("#serial-info").html('');
    }
  });
  $("#fleet-checker").on('input', function (e) {
    serial_value = e.target.value;

    if (serial_value.length >= 8) {
      console.log('Length is 8');
      $.ajax({
        type: 'GET',
        url: 'http://fleetmanager.mac/api/serials/search/' + serial_value,
        success: function success(data) {
          serial_data = data;

          if (!$.isEmptyObject(serial_data)) {
            if (serial_data.status == "used") {
              $("#fleet-info").html('<div class="flatnotification flatnotification-danger">Ce numéro de série est déjà utilisé.</div>');
            } else {
              $("#fleet-info").html('<div class="flatnotification flatnotification-success">Ce numéro de série est disponible.</div>');
              $("#o--info").fadeIn();
            }
          } else {
            $("#fleet-info").html('<div class="flatnotification flatnotification-destroy">Le numéro de série n\'a pas été reconnu.</div>');
          }
        },
        error: function error() {
          console.log('Error');
        }
      });
    } else {
      $("#fleet-info").html('');
      $("#o--info").fadeOut('fast');
    }
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/rlomvin/webapps/fleetmanager/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/rlomvin/webapps/fleetmanager/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });