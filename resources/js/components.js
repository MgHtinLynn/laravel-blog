import Vue from 'vue';

Vue.component('app-layout', require('./components/Layouts/AppLayout').default);

//article
Vue.component('article-listing', require('./components/Article/Listing').default);
Vue.component('article-create-form',require('./components/Article/Create').default);
Vue.component('article-edit-form',require('./components/Article/Edit').default);

//Helper
Vue.component("spinner", require("./components/Spinner.vue").default);

//Utilize
Vue.component("app-form-section", require("./components/Utilities/AppFormSection.vue").default);
Vue.component("app-input-error", require("./components/Utilities/AppInputError.vue").default);
Vue.component("app-flash-message", require("./components/Utilities/AppFlashMessage.vue").default);


//dashboard article
Vue.component("dashboard-article-list", require("./components/Dashboard/Dashboard.vue").default);
Vue.component("recommend-article-list", require("./components/Dashboard/RecommendList.vue").default);
