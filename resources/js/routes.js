import Login from "./components/acounts/login";
import Register from "./components/acounts/register";
import ActivatEemail from "./components/acounts/activateemail";
import Logout from "./components/acounts/logout";
import Dashboard from "./components/dashboard/dashboard";
import DashboardHome from "./components/dashboard/home";
import DashUsers from "./components/dashboard/users/DashUsers";
import Users from "./components/dashboard/users/users";
import EditUsers from "./components/dashboard/users/EditUsers";
import DashTikets from "./components/dashboard/tikets/DashTikets";
import Tikets from "./components/dashboard/tikets/tikets";
import DeleteTiket from "./components/dashboard/tikets/DeleteTiket";
import AddTiket from "./components/dashboard/tikets/AddTiket";
import EditTiket from "./components/dashboard/tikets/EditTiket";
import NotFound from "./components/NotFound";
import Home from "./components/home";
import Showtikets from "./components/Showtikets";
export default {
    mode: "history",
    routes: [{
            path: "*",
            component: NotFound,
            name: "NotFound"

        },
        {
            path: "/",
            component: Home,
            name: "Home"

        },
        {
            path: "/login",
            component: Login,
            name: "Login",
            meta: {
                account: true,


            }

        },
        {
            path: "/logout",
            component: Logout,
            name: "Logout",
            meta: {
                requiresAuth: true,


            }

        },
        {
            path: "/activateemail/:token",
            component: ActivatEemail,
            name: "ActivatEemail",
            meta: {

                account: true,
            }

        },
        {
            path: "/showtikets",
            component: Showtikets,
            name: "Showtikets",
            meta: {
                requiresAuth: true,
                user: true

            }

        },
        {
            path: "/register",
            component: Register,
            name: "Register",
            meta: {
                account: true,

            }

        },
        {
            path: "/dashboard",
            component: Dashboard,
            meta: {
                requiresAuth: true,
                is_admin: true
            },

            children: [{
                    path: "",
                    component: DashboardHome,
                    name: "Dashboard"
                },
                {
                    path: "users",
                    component: DashUsers,

                    children: [{
                            path: "",
                            component: Users,
                            name: "Users"
                        }, {
                            path: ":id/edit",
                            component: EditUsers,
                            name: "EditUsers"
                        }

                    ]

                },
                {
                    path: "tikets",
                    component: DashTikets,

                    children: [{
                            path: "",
                            component: Tikets,
                            name: "Tikets"
                        }, {
                            path: ":id/delete",
                            component: DeleteTiket,
                            name: "DeleteTiket"
                        }, {
                            path: ":id/edit",
                            component: EditTiket,
                            name: "EditTiket"
                        }, {
                            path: "add",
                            component: AddTiket,
                            name: "AddTiket"
                        }

                    ]
                }
            ]

        }
    ]
}