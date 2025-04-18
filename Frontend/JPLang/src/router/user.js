const user = [
    {
        path: "/user",
        component: () => import("../pages/admin/layouts/index.vue"),
        children: [
            {
                path: "/alphabet",
                name: "alphabet",
                component: () => import("../pages/users/alphabet.vue")
            },
            {
                path: "/jpsearch",
                name: "jpsearch",
                component: () => import("../pages/users/search.vue")
            },
            {
                path: "/",
                name: "coures",
                component: () => import("../pages/users/courses.vue")
            },
            {
                path: "/courses/:slug/coursedetail",
                name: "coursedetail",
                component: () => import("../pages/users/coursesdetail.vue")
            },{
                path: "/courses/:slug/lesson",
                name: "lessonCourse",
                component: () => import("../pages/users/lessons.vue")
            },{
                path: "/:slug/lesson",
                name: "lessondetail",
                component: () => import("../pages/users/lessonsdetail.vue")
            },
            {
                path: "/about",
                name: "about",
                component: () => import("../pages/users/about.vue"),
            },{
                path: "/profile",
                name: "profile",
                component: () => import("../pages/users/profile.vue"),
            },{
                path: "/converstation",
                name: "converstation",
                component: () => import("../pages/users/conversation.vue"),
            },{
                path: "/converstation_detail",
                name: "converstation_detail",
                component: () => import("../pages/users/conversation.vue"),
            },{
                path: "/GetConversations",
                name: "GetConversations",
                component: () => import("../pages/users/vocabularies.vue"),
            }
        ],
    }, {
        path: "/login",
        name: "login",
        component: () => import("../pages/users/login.vue"),
    }, {
        path: "/register",
        name: "register",
        component: () => import("../pages/users/register.vue"),
    }
]
export default user;