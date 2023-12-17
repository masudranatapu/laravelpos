import $ from 'jquery';

const VueJQuery = {
  install(Vue) {
    Object.defineProperty(Vue.prototype, '$jQuery', { value: $ });
    Object.defineProperty(Vue.prototype, '$$', { value: $.fn });
  },
};

export default VueJQuery;
