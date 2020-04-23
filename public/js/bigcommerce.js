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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'bigcommerce-custom-fields',
  mixins: [__webpack_require__(/*! ../../mixins/datatables */ "./resources/js/mixins/datatables.js")["default"]]
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'bigcommerce-images',
  mixins: [__webpack_require__(/*! ../../mixins/datatables */ "./resources/js/mixins/datatables.js")["default"]]
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'bigcommerce-related',
  mixins: [__webpack_require__(/*! ../../mixins/datatables */ "./resources/js/mixins/datatables.js")["default"]]
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'bigcommerce-reviews',
  mixins: [__webpack_require__(/*! ../../mixins/datatables */ "./resources/js/mixins/datatables.js")["default"]],
  methods: {
    status: function status(value) {
      switch (value) {
        case 'pending':
          return 'warning';

        case 'approved':
          return 'success';

        case 'disapproved':
          return 'danger';
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Dashboard.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Dashboard.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({// 
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Install/Index.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Install/Index.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  head: {
    title: function title() {
      return {
        inner: 'BigCommerce - Install'
      };
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/Index.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Products/Index.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
/* harmony default export */ __webpack_exports__["default"] = ({
  head: {
    title: function title() {
      return {
        inner: 'Products'
      };
    }
  },
  data: function data() {
    return {
      endpoint: '/datatable/bigcommerce/products'
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/View.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Products/View.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default, getRecord */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getRecord", function() { return getRecord; });
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
//
//
//
//
//
//
//
//
//
// import _ from 'lodash'
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      data: {},
      endpoint: {
        reviews: "/datatable/bigcommerce/products/".concat(this.id, "/reviews"),
        related: "/datatable/bigcommerce/products/".concat(this.id, "/related"),
        images: "/datatable/bigcommerce/products/".concat(this.id, "/images"),
        customfields: "/datatable/bigcommerce/products/".concat(this.id, "/customfields")
      }
    };
  },
  components: {
    'product-images': __webpack_require__(/*! ../../components/datatables/ProductImage.vue */ "./resources/js/components/datatables/ProductImage.vue")["default"],
    'product-related': __webpack_require__(/*! ../../components/datatables/ProductRelated.vue */ "./resources/js/components/datatables/ProductRelated.vue")["default"],
    'product-reviews': __webpack_require__(/*! ../../components/datatables/ProductReview.vue */ "./resources/js/components/datatables/ProductReview.vue")["default"],
    'product-custom-fields': __webpack_require__(/*! ../../components/datatables/ProductCustomFields.vue */ "./resources/js/components/datatables/ProductCustomFields.vue")["default"]
  },
  props: {
    id: {
      type: Number,
      required: true
    }
  },
  beforeRouteEnter: function beforeRouteEnter(to, from, next) {
    getRecord(to.params.id, function (error, data) {
      if (error) {
        next(function (vm) {
          vm.$router.push('/bigcommerce/products');
          toast(error.toString(), 'danger');
        });
      } else {
        next(function (vm) {
          vm.data = data;
          vm.$emit('updateHead');
        });
      }
    });
  },
  beforeRouteUpdate: function beforeRouteUpdate(to, from, next) {
    var _this = this;

    getRecord(to.params.id, function (error, data) {
      if (error) {
        _this.$router.push('/bigcommerce/products');

        toast(error.toString(), 'danger');
      } else {
        _this.data = data;

        _this.$emit('updateHead');
      }
    });
    next();
  }
});
function getRecord(id, callback) {
  axios.get("/api/bigcommerce/products/".concat(id)).then(function (response) {
    callback(null, response.data.data);
  })["catch"](function (error) {
    callback(new Error('The requested entry could not be found'));
  });
}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p-table", {
    key: "product_custom_fields_table",
    attrs: {
      endpoint: _vm.endpoint,
      id: "product_custom_fields",
      "sort-by": "name",
      "primary-key": "id"
    },
    scopedSlots: _vm._u([
      {
        key: "value",
        fn: function(table) {
          return [
            _c("span", {
              staticClass: "text-gray-800 text-sm",
              domProps: { innerHTML: _vm._s(table.record.value) }
            })
          ]
        }
      }
    ])
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e& ***!
  \**************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p-table", {
    key: "images_table",
    attrs: {
      endpoint: _vm.endpoint,
      id: "images",
      "sort-by": "description",
      "primary-key": "id"
    },
    scopedSlots: _vm._u([
      {
        key: "url_standard",
        fn: function(table) {
          return [
            _c("img", {
              staticClass: "h-24",
              attrs: {
                src: table.record.url_standard,
                alt: table.record.description
              }
            })
          ]
        }
      },
      {
        key: "description",
        fn: function(table) {
          return [
            _c("span", {
              staticClass: "text-gray-800 text-sm",
              domProps: { innerHTML: _vm._s(table.record.description) }
            })
          ]
        }
      },
      {
        key: "is_thumbnail",
        fn: function(table) {
          return [
            table.record.is_thumbnail
              ? _c("span", { staticClass: "badge badge--success" }, [
                  _vm._v("Thumbnail")
                ])
              : _c("span")
          ]
        }
      }
    ])
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p-table", {
    key: "related_table",
    attrs: {
      endpoint: _vm.endpoint,
      id: "related",
      "sort-by": "name",
      "primary-key": "id"
    },
    scopedSlots: _vm._u([
      {
        key: "name",
        fn: function(table) {
          return [
            _c("p-status", {
              staticClass: "mr-2",
              attrs: { value: table.record.is_visible }
            }),
            _vm._v(" "),
            _c(
              "router-link",
              {
                attrs: {
                  to: {
                    name: "bigcommerce.products.view",
                    params: { id: table.record.id }
                  }
                }
              },
              [_vm._v(_vm._s(table.record.name))]
            )
          ]
        }
      },
      {
        key: "is_featured",
        fn: function(table) {
          return [
            table.record.is_featured === 1
              ? _c("span", { staticClass: "badge badge--success" }, [
                  _vm._v("Featured")
                ])
              : _c("span")
          ]
        }
      },
      {
        key: "actions",
        fn: function(table) {
          return [
            _c(
              "p-actions",
              {
                key: "related_" + table.record.id + "_actions",
                attrs: { id: "related_" + table.record.id + "_actions" }
              },
              [
                _c(
                  "p-dropdown-link",
                  {
                    attrs: {
                      to: {
                        name: "bigcommerce.products.view",
                        params: { id: table.record.id }
                      }
                    }
                  },
                  [_vm._v("View")]
                )
              ],
              1
            )
          ]
        }
      }
    ])
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552& ***!
  \***************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("p-table", {
    key: "product_reviews_table",
    attrs: {
      endpoint: _vm.endpoint,
      id: "product_reviews",
      "sort-by": "date_created",
      "primary-key": "id"
    },
    scopedSlots: _vm._u([
      {
        key: "text",
        fn: function(table) {
          return [
            _c(
              "span",
              {
                staticClass: "mr-2",
                class: "text-" + _vm.status(table.record.status) + "-500"
              },
              [
                _c(
                  "svg",
                  {
                    staticClass: "icon fa-xs svg-inline--fa fa-circle fa-w-16",
                    attrs: {
                      "aria-hidden": "true",
                      focusable: "false",
                      "data-prefix": "fas",
                      "data-icon": "circle",
                      role: "img",
                      xmlns: "http://www.w3.org/2000/svg",
                      viewBox: "0 0 512 512"
                    }
                  },
                  [
                    _c("path", {
                      attrs: {
                        fill: "currentColor",
                        d:
                          "M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _c("span", {
                  staticClass: "text-gray-800 text-sm",
                  domProps: { innerHTML: _vm._s(table.record.text) }
                })
              ]
            )
          ]
        }
      },
      {
        key: "rating",
        fn: function(table) {
          return [
            table.record.rating >= 1
              ? _c("fa-icon", {
                  staticClass: "fa-fw text-primary",
                  attrs: { icon: ["fas", "star"] }
                })
              : _vm._e(),
            _vm._v(" "),
            table.record.rating >= 2
              ? _c("fa-icon", {
                  staticClass: "fa-fw text-primary",
                  attrs: { icon: ["fas", "star"] }
                })
              : _vm._e(),
            _vm._v(" "),
            table.record.rating >= 3
              ? _c("fa-icon", {
                  staticClass: "fa-fw text-primary",
                  attrs: { icon: ["fas", "star"] }
                })
              : _vm._e(),
            _vm._v(" "),
            table.record.rating >= 4
              ? _c("fa-icon", {
                  staticClass: "fa-fw text-primary",
                  attrs: { icon: ["fas", "star"] }
                })
              : _vm._e(),
            _vm._v(" "),
            table.record.rating >= 5
              ? _c("fa-icon", {
                  staticClass: "fa-fw text-primary",
                  attrs: { icon: ["fas", "star"] }
                })
              : _vm._e()
          ]
        }
      },
      {
        key: "date_created",
        fn: function(table) {
          return [
            _vm._v(
              "\n        " +
                _vm._s(_vm.$moment(table.record.date_created).fromNow()) +
                "\n    "
            )
          ]
        }
      }
    ])
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6&":
/*!*******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6& ***!
  \*******************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("portal", { attrs: { to: "title" } }, [
        _vm._v("BigCommerce Dashboard")
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2& ***!
  \***********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "portal",
        { attrs: { to: "title" } },
        [
          _c("app-title", { attrs: { icon: "paper-plane" } }, [
            _vm._v("BigCommerce - Install Wizard")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _vm._m(0)
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "content-container" }, [
        _vm._v("\n            Welcome!!\n        ")
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "portal",
        { attrs: { to: "title" } },
        [
          _c("app-title", { attrs: { icon: "paper-plane" } }, [
            _vm._v("BigCommerce - Products")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c(
          "div",
          { staticClass: "content-container" },
          [
            _c("p-table", {
              key: "products_table",
              attrs: {
                endpoint: _vm.endpoint,
                id: "products",
                "sort-by": "name",
                "primary-key": "id"
              },
              scopedSlots: _vm._u([
                {
                  key: "name",
                  fn: function(table) {
                    return [
                      _c("p-status", {
                        staticClass: "mr-2",
                        attrs: { value: table.record.is_visible }
                      }),
                      _vm._v(" "),
                      _c(
                        "router-link",
                        {
                          attrs: {
                            to: {
                              name: "bigcommerce.products.view",
                              params: { id: table.record.id }
                            }
                          }
                        },
                        [_vm._v(_vm._s(table.record.name))]
                      )
                    ]
                  }
                },
                {
                  key: "is_featured",
                  fn: function(table) {
                    return [
                      table.record.is_featured === 1
                        ? _c("span", { staticClass: "badge badge--success" }, [
                            _vm._v("Featured")
                          ])
                        : _c("span")
                    ]
                  }
                },
                {
                  key: "actions",
                  fn: function(table) {
                    return [
                      _c(
                        "p-actions",
                        {
                          key: "product_" + table.record.id + "_actions",
                          attrs: {
                            id: "product_" + table.record.id + "_actions"
                          }
                        },
                        [
                          _c(
                            "p-dropdown-link",
                            {
                              attrs: {
                                to: {
                                  name: "bigcommerce.products.view",
                                  params: { id: table.record.id }
                                }
                              }
                            },
                            [_vm._v("View")]
                          )
                        ],
                        1
                      )
                    ]
                  }
                }
              ])
            })
          ],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/View.vue?vue&type=template&id=073fe201&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Products/View.vue?vue&type=template&id=073fe201& ***!
  \***********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form-container",
    {
      scopedSlots: _vm._u([
        {
          key: "sidebar",
          fn: function() {
            return [
              _c("div", { staticClass: "card" }, [
                _c(
                  "div",
                  { staticClass: "card__body" },
                  [
                    _c(
                      "p-tabs",
                      [
                        _c(
                          "p-tab",
                          { key: "pricing", attrs: { name: "Pricing" } },
                          [
                            _c("p-input", {
                              attrs: {
                                label: "Price",
                                readonly: true,
                                value: _vm.data.price
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Cost Price",
                                readonly: true,
                                value: _vm.data.cost_price
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Retail Price",
                                readonly: true,
                                value: _vm.data.retail_price
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Sale Price",
                                readonly: true,
                                value: _vm.data.sale_price
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Calculated Price",
                                readonly: true,
                                value: _vm.data.calculated_price
                              }
                            })
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "p-tab",
                          { key: "shipping", attrs: { name: "Shipping" } },
                          [
                            _c("p-input", {
                              attrs: {
                                label: "Weight",
                                readonly: true,
                                value: _vm.data.weight
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Width",
                                readonly: true,
                                value: _vm.data.width
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Length",
                                readonly: true,
                                value: _vm.data.length
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Height",
                                readonly: true,
                                value: _vm.data.height
                              }
                            })
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "p-tab",
                          { key: "inventory", attrs: { name: "Inventory" } },
                          [
                            _c("p-input", {
                              attrs: {
                                label: "Current Level",
                                readonly: true,
                                value: _vm.data.inventory_level
                              }
                            }),
                            _vm._v(" "),
                            _c("p-input", {
                              attrs: {
                                label: "Warning Level",
                                readonly: true,
                                value: _vm.data.inventory_warning_level
                              }
                            }),
                            _vm._v(" "),
                            _c("div", { staticClass: "form__group" }, [
                              _c("label", { staticClass: "form__label" }, [
                                _vm._v("Tracking")
                              ]),
                              _vm._v(" "),
                              _vm.data.inventory_tracking === "product"
                                ? _c(
                                    "span",
                                    { staticClass: "badge badge--success" },
                                    [_vm._v("Product")]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.data.inventory_tracking === "variant"
                                ? _c(
                                    "span",
                                    { staticClass: "badge badge--success" },
                                    [_vm._v("Variant")]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.data.inventory_tracking === "none"
                                ? _c(
                                    "span",
                                    { staticClass: "badge badge--danger" },
                                    [_vm._v("Not Tracking")]
                                  )
                                : _vm._e()
                            ])
                          ],
                          1
                        )
                      ],
                      1
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _vm.data
                ? _c(
                    "p-definition-list",
                    [
                      _c(
                        "p-definition",
                        { attrs: { name: "Status" } },
                        [
                          _c("fa-icon", {
                            staticClass: "fa-fw text-xs",
                            class: {
                              "text-success-500": _vm.data.is_visible,
                              "text-danger-500": !_vm.data.is_visible
                            },
                            attrs: { icon: ["fas", "circle"] }
                          }),
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm.data.is_visible ? "Visible" : "Hidden"
                              ) +
                              "\n            "
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("p-definition", { attrs: { name: "Created At" } }, [
                        _vm._v(
                          "\n                " +
                            _vm._s(
                              _vm
                                .$moment(_vm.data.created_at)
                                .format("Y-MM-DD, hh:mm a")
                            ) +
                            "\n            "
                        )
                      ]),
                      _vm._v(" "),
                      _c("p-definition", { attrs: { name: "Updated At" } }, [
                        _vm._v(
                          "\n                " +
                            _vm._s(
                              _vm
                                .$moment(_vm.data.updated_at)
                                .format("Y-MM-DD, hh:mm a")
                            ) +
                            "\n            "
                        )
                      ])
                    ],
                    1
                  )
                : _vm._e()
            ]
          },
          proxy: true
        }
      ])
    },
    [
      _c("portal", { attrs: { to: "actions" } }, [
        _c(
          "div",
          { staticClass: "buttons" },
          [
            _c(
              "router-link",
              {
                staticClass: "button",
                attrs: { to: { name: "bigcommerce.products" } }
              },
              [_vm._v("Go Back")]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c(
        "portal",
        { attrs: { to: "title" } },
        [
          _c("app-title", { attrs: { icon: "paper-plane" } }, [
            _vm._v("BigCommerce - " + _vm._s(_vm.data.name))
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "card" }, [
        _c(
          "div",
          { staticClass: "card__body" },
          [
            _c("p-title", {
              attrs: { name: "name", readonly: true },
              model: {
                value: _vm.data.name,
                callback: function($$v) {
                  _vm.$set(_vm.data, "name", $$v)
                },
                expression: "data.name"
              }
            }),
            _vm._v(" "),
            _c("p-input", {
              attrs: { name: "sku", label: "SKU", monospaced: "" },
              model: {
                value: _vm.data.sku,
                callback: function($$v) {
                  _vm.$set(_vm.data, "sku", $$v)
                },
                expression: "data.sku"
              }
            }),
            _vm._v(" "),
            _c(
              "p-tabs",
              [
                _c(
                  "p-tab",
                  { key: "images", attrs: { name: "Images & Videos" } },
                  [
                    _c("product-images", {
                      attrs: { endpoint: _vm.endpoint.images }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "p-tab",
                  { key: "related", attrs: { name: "Related" } },
                  [
                    _c("product-related", {
                      attrs: { endpoint: _vm.endpoint.related }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "p-tab",
                  { key: "custom-fields", attrs: { name: "Custom Fields" } },
                  [
                    _c("product-custom-fields", {
                      attrs: { endpoint: _vm.endpoint.customfields }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "p-tab",
                  { key: "reviews", attrs: { name: "Reviews" } },
                  [
                    _c("product-reviews", {
                      attrs: { endpoint: _vm.endpoint.reviews }
                    })
                  ],
                  1
                )
              ],
              1
            )
          ],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/bigcommerce.js":
/*!*************************************!*\
  !*** ./resources/js/bigcommerce.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _routes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./routes */ "./resources/js/routes.js");
 // append routes

window.Fusion.booting(function (router, state) {
  return router.addRoutes(_routes__WEBPACK_IMPORTED_MODULE_0__["default"]);
});

/***/ }),

/***/ "./resources/js/components/datatables/ProductCustomFields.vue":
/*!********************************************************************!*\
  !*** ./resources/js/components/datatables/ProductCustomFields.vue ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductCustomFields.vue?vue&type=template&id=2a542104& */ "./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104&");
/* harmony import */ var _ProductCustomFields_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductCustomFields.vue?vue&type=script&lang=js& */ "./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductCustomFields_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/datatables/ProductCustomFields.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductCustomFields_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductCustomFields.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductCustomFields_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductCustomFields.vue?vue&type=template&id=2a542104& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductCustomFields.vue?vue&type=template&id=2a542104&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductCustomFields_vue_vue_type_template_id_2a542104___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/datatables/ProductImage.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/datatables/ProductImage.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductImage.vue?vue&type=template&id=e1ee6a5e& */ "./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e&");
/* harmony import */ var _ProductImage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductImage.vue?vue&type=script&lang=js& */ "./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductImage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/datatables/ProductImage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductImage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductImage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductImage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductImage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductImage.vue?vue&type=template&id=e1ee6a5e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductImage.vue?vue&type=template&id=e1ee6a5e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductImage_vue_vue_type_template_id_e1ee6a5e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/datatables/ProductRelated.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/datatables/ProductRelated.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductRelated.vue?vue&type=template&id=20b793be& */ "./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be&");
/* harmony import */ var _ProductRelated_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductRelated.vue?vue&type=script&lang=js& */ "./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductRelated_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/datatables/ProductRelated.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductRelated_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductRelated.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductRelated.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductRelated_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductRelated.vue?vue&type=template&id=20b793be& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductRelated.vue?vue&type=template&id=20b793be&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductRelated_vue_vue_type_template_id_20b793be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/datatables/ProductReview.vue":
/*!**************************************************************!*\
  !*** ./resources/js/components/datatables/ProductReview.vue ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProductReview.vue?vue&type=template&id=39ab3552& */ "./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552&");
/* harmony import */ var _ProductReview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProductReview.vue?vue&type=script&lang=js& */ "./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProductReview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/datatables/ProductReview.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductReview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductReview.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductReview.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductReview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552& ***!
  \*********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProductReview.vue?vue&type=template&id=39ab3552& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/datatables/ProductReview.vue?vue&type=template&id=39ab3552&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProductReview_vue_vue_type_template_id_39ab3552___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/mixins/datatables.js":
/*!*******************************************!*\
  !*** ./resources/js/mixins/datatables.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    endpoint: {
      type: String,
      required: true
    }
  }
});

/***/ }),

/***/ "./resources/js/routes.js":
/*!********************************!*\
  !*** ./resources/js/routes.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/* harmony default export */ __webpack_exports__["default"] = ([{
  path: '/bigcommerce',
  component: __webpack_require__(/*! ./views/Dashboard */ "./resources/js/views/Dashboard.vue")["default"],
  name: 'bigcommerce',
  meta: {
    requiresAuth: true,
    layout: 'admin'
  }
}, {
  path: '/bigcommerce/install',
  component: __webpack_require__(/*! ./views/Install/Index */ "./resources/js/views/Install/Index.vue")["default"],
  name: 'bigcommerce',
  meta: {
    requiresAuth: true,
    layout: 'admin'
  }
}, {
  path: '/bigcommerce/products',
  component: __webpack_require__(/*! ./views/Products/Index */ "./resources/js/views/Products/Index.vue")["default"],
  name: 'bigcommerce.products',
  meta: {
    requiresAuth: true,
    layout: 'admin'
  }
}, {
  path: '/bigcommerce/products/:id',
  component: __webpack_require__(/*! ./views/Products/View */ "./resources/js/views/Products/View.vue")["default"],
  name: 'bigcommerce.products.view',
  props: function props(route) {
    var props = _objectSpread({}, route.params);

    props.id = +props.id;
    return props;
  },
  meta: {
    requiresAuth: true,
    layout: 'admin'
  }
}]);

/***/ }),

/***/ "./resources/js/views/Dashboard.vue":
/*!******************************************!*\
  !*** ./resources/js/views/Dashboard.vue ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=template&id=1f79daf6& */ "./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6&");
/* harmony import */ var _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=script&lang=js& */ "./resources/js/views/Dashboard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Dashboard.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Dashboard.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/views/Dashboard.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Dashboard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Dashboard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6&":
/*!*************************************************************************!*\
  !*** ./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6& ***!
  \*************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Dashboard.vue?vue&type=template&id=1f79daf6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Dashboard.vue?vue&type=template&id=1f79daf6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_1f79daf6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/Install/Index.vue":
/*!**********************************************!*\
  !*** ./resources/js/views/Install/Index.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=a4d29ca2& */ "./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/views/Install/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Install/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Install/Index.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Install/Index.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Install/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2&":
/*!*****************************************************************************!*\
  !*** ./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=a4d29ca2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Install/Index.vue?vue&type=template&id=a4d29ca2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_a4d29ca2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/Products/Index.vue":
/*!***********************************************!*\
  !*** ./resources/js/views/Products/Index.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=10fd3ba6& */ "./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/views/Products/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Products/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Products/Index.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/views/Products/Index.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6&":
/*!******************************************************************************!*\
  !*** ./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=10fd3ba6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/Index.vue?vue&type=template&id=10fd3ba6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_10fd3ba6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/Products/View.vue":
/*!**********************************************!*\
  !*** ./resources/js/views/Products/View.vue ***!
  \**********************************************/
/*! exports provided: getRecord, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./View.vue?vue&type=template&id=073fe201& */ "./resources/js/views/Products/View.vue?vue&type=template&id=073fe201&");
/* harmony import */ var _View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./View.vue?vue&type=script&lang=js& */ "./resources/js/views/Products/View.vue?vue&type=script&lang=js&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getRecord", function() { return _View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["getRecord"]; });

/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__["render"],
  _View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Products/View.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Products/View.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Products/View.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default, getRecord */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./View.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/View.vue?vue&type=script&lang=js&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "getRecord", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["getRecord"]; });

 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Products/View.vue?vue&type=template&id=073fe201&":
/*!*****************************************************************************!*\
  !*** ./resources/js/views/Products/View.vue?vue&type=template&id=073fe201& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./View.vue?vue&type=template&id=073fe201& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Products/View.vue?vue&type=template&id=073fe201&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_View_vue_vue_type_template_id_073fe201___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 0:
/*!*******************************************!*\
  !*** multi ./resources/js/bigcommerce.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/shanekrolikowski/Code/fusioncms-v6/modules/Bigcommerce/resources/js/bigcommerce.js */"./resources/js/bigcommerce.js");


/***/ })

/******/ });