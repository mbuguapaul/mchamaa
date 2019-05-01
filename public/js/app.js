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

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: c:\\xampp\\htdocs\\newlaravel\\resources\\js\\app.js: Unexpected token (11:11)\n\n\u001b[0m \u001b[90m  9 | \u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 10 | \u001b[39mwindow\u001b[33m.\u001b[39m\u001b[33mVue\u001b[39m \u001b[33m=\u001b[39m require(\u001b[32m'vue'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 11 | \u001b[39m\u001b[36mimport\u001b[39m chat\u001b[33m-\u001b[39mform from \u001b[32m'./components/ChatMessages.vue'\u001b[39m\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m           \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 12 | \u001b[39m\u001b[33mVue\u001b[39m\u001b[33m.\u001b[39mcomponent(\u001b[32m'chat-messages'\u001b[39m\u001b[33m,\u001b[39m require(\u001b[32m'./components/ChatMessages.vue'\u001b[39m))\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 13 | \u001b[39m\u001b[33mVue\u001b[39m\u001b[33m.\u001b[39mcomponent(\u001b[32m'chat-form'\u001b[39m\u001b[33m,\u001b[39m require(\u001b[32m'./components/ChatForm.vue'\u001b[39m))\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 14 | \u001b[39m\u001b[0m\n    at Parser.raise (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:6322:17)\n    at Parser.unexpected (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:7638:16)\n    at Parser.expectContextual (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:7604:41)\n    at Parser.parseImport (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:11107:12)\n    at Parser.parseStatementContent (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:9861:27)\n    at Parser.parseStatement (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:9763:17)\n    at Parser.parseBlockOrModuleBlockBody (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:10340:25)\n    at Parser.parseBlockBody (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:10327:10)\n    at Parser.parseTopLevel (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:9692:10)\n    at Parser.parse (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:11209:17)\n    at parse (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\parser\\lib\\index.js:11245:38)\n    at parser (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:170:34)\n    at normalizeFile (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\core\\lib\\transformation\\normalize-file.js:138:11)\n    at runSync (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\core\\lib\\transformation\\index.js:44:43)\n    at runAsync (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\core\\lib\\transformation\\index.js:35:14)\n    at process.nextTick (c:\\xampp\\htdocs\\newlaravel\\node_modules\\@babel\\core\\lib\\transform.js:34:34)\n    at process._tickCallback (internal/process/next_tick.js:61:11)");

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

__webpack_require__(/*! c:\xampp\htdocs\newlaravel\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! c:\xampp\htdocs\newlaravel\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });