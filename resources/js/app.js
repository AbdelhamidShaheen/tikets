require('./bootstrap');
import Vue from 'vue';
import VueRouter from "vue-router";
import VueMeta from 'vue-meta'
import routes from './routes';

Vue.use(VueRouter);
Vue.use(VueMeta);

const router = new VueRouter(routes);
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.account)) {
        var auth = JSON.parse(localStorage.getItem("auth"));
        if (auth) {
            next({ name: "Home" });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.requiresAuth)) {
        var auth = JSON.parse(localStorage.getItem("auth"));
        if (!auth) {
            next({ name: "Login" });
        } else {
            var user = JSON.parse(localStorage.getItem("user"));

            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.role != "admin") {
                    next({ name: "Home" });
                } else {
                    next();

                }
            } else if (to.matched.some(record => record.meta.user)) {
                if (user.role != "user") {
                    next({ name: "Home" });
                } else {
                    next();

                }
            } else {
                next();

            }

        }

    } else {
        next();

    }
});


const app = new Vue({

    el: "#app",
    router: router,
    data() {
        return {
            auth: JSON.parse(localStorage.getItem("auth")) ? JSON.parse(localStorage.getItem("auth")) : false,
            role: JSON.parse(localStorage.getItem("user")) ? JSON.parse(localStorage.getItem("user")).role : false,

        }
    },
    mounted() {

        console.log(this.auth);
        console.log(this.role);
    },
    methods: {
        handleUpdate: function(value) {
            switch (value) {
                case "login":
                    this.auth = JSON.parse(localStorage.getItem("auth"));
                    this.role = JSON.parse(localStorage.getItem("user")).role;
                    console.log("login");
                    break;
                case "logout":
                    this.auth = false;
                    this.role = false;
                    console.log("logout");
                    break;
            }


        },

    }


});