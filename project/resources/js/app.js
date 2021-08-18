require('./bootstrap');

window.Vue = require('vue');

import Snotify, { SnotifyPosition } from 'vue-snotify';
import VueMask from 'v-mask';

import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyAvWNuEF4Xm2c6u2k6sZdUImnWR3pT_ylY'
  }
})

Vue.use(Snotify, {
  toast: {
    timeout: 3000,
    showProgressBar: false,
    position: SnotifyPosition.rightTop
  }
});

Vue.use(VueMask);

require('./Components');
