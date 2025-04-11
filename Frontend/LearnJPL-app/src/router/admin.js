const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin/admin.vue"),
        children: [
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/user/index.vue")
            },
            {
                path: "trương-tring",
                name: "truongtrinh",
                component: () => import("../pages/users/user/index.vue")
            }
        ]
    }
]
export default admin