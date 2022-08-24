import store from './store';

import Vue from 'vue'

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

Vue.component('section-add-component', require('./components/section/SectionAddComponent').default);
Vue.component('section-add-main-component', require('./components/section/SectionAddMain').default);
Vue.component('section-update-main-component', require('./components/section/SectionUpdateMain').default);
Vue.component('event-attribute', require('./components/event/EventAttribute').default);
Vue.component('qualification-tab', require('./components/people/QualificationTab').default);

Vue.component('slider-create', require('./components/slider/SliderCreate').default);
Vue.component('slider-update', require('./components/slider/SliderUpdate').default);

const app = new Vue({
    store,
    el: '#app',
});

