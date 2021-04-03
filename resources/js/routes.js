import Home from "./components/home";
import Front from "./components/front";
import NotFound from "./components/NotFound.vue";
export default{
    mode:"history",
    routes:[
        {
            path:"*",
            component:NotFound

        },
        {
            path:"/",
            component:Home

        },
        {
            path:"/front",
            component:Front

        }
    ]
}