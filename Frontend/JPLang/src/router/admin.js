const admin = [
    {
        path: "/admin",
        component: () => import("../pages/admin/layouts/index.vue"),
        children: [
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/course/index.vue")
            },{
                path: "users_chuongtrinh",
                name: "chuongtrinh",
                component: () => import("../pages/admin/course/index.vue")
            },
        ]
    }
]
export default admin