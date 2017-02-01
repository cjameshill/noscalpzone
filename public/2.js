webpackJsonp([2],{

/***/ 219:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__data_Dashboard__ = __webpack_require__(220);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__data_data__ = __webpack_require__(189);
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = {};

/***/ }),

/***/ 220:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* unused harmony default export */ var _unused_webpack_default_export = {};

/***/ }),

/***/ 221:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(2)(
  /* script */
  __webpack_require__(219),
  /* template */
  __webpack_require__(222),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/Users/Chris/Dropbox/WEB/PROJECTS/NOSCALPZONE/noscalpzoneweb/resources/assets/js/views/dashboard/Home.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Home.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-786b9458", Component.options)
  } else {
    hotAPI.reload("data-v-786b9458", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 222:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _vm._m(0)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "columns center-column"
  }, [_c('div', {
    staticClass: "column"
  }, [_c('h1', {
    staticClass: "subtitle is-3 is-sans-serif is-underlined"
  }, [_vm._v("\n           Dashboard\n        ")])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-786b9458", module.exports)
  }
}

/***/ })

});