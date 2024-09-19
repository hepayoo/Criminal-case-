import { createRouter, createWebHistory } from "vue-router";

import HomePage from '../pages/HomePage.vue';
import RegisterPage from '../pages/RegisterPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import Dashboard from '../pages/Dashboard.vue';
import FamilyDashboard from '../pages/FamilyDashboard.vue';
import UserDashboard from '../pages/UserDashboard.vue';
import Case from '../pages/Case.vue';
import About from '../pages/About.vue';
import ReportCase from '../pages/ReportCase.vue';
import Communities from '../pages/Communities.vue';
import SingleCase from '../pages/SingleCase.vue';
import CaseManagement from '../pages/CaseManagement.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomePage, // Displays "Hello Vue" and the Register button
  },

  {
    path: '/register',
    name: 'Register',
    component: RegisterPage,
    meta: { requiresGuest: true } // Displays the Register page
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage,
    meta: { requiresGuest: true } // Displays the Register page
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
    meta: { requiresAuth: true, isAdmin: true },
    children: [
      {
        path: "casemanagement",
        name: "CaseManagement",
        component:CaseManagement ,
        meta: { requiresAuth: true, isAdmin: true },
        
      },
   
   
    ]

    
},
{
  path: "/casemanagement",
  name: "CaseManagement",
  component:CaseManagement ,
  
  
},


{
  path: '/family-dashboard',
  name: 'FamilyDashboard',
  component: FamilyDashboard,
  meta: { requiresAuth: true },
  // Nested routes for family dashboard
  children: [
    { path: 'case', name: 'Case', component: Case },
    { path: 'about', name: 'About', component: About },
    { path: 'communities', name: 'Communities', component: Communities },
    { path: 'reportcase', name: 'ReportCase', component: ReportCase },
    { path: 'singlecase/:slug', name: 'SingleCase', component: SingleCase , props: true },
  ]
},
  {
    path: '/user-dashboard',
    name: 'UserDashboard',
    component: UserDashboard,
    meta: { requiresAuth: true },
    children: [
      { path: 'case', name: 'Case', component: Case },
      { path: 'about', name: 'About', component: About },
      { path: 'communities', name: 'Communities', component: Communities },
     
      { path: 'singlecase/:slug', name: 'SingleCase', component: SingleCase , props: true },
    ]
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});



const getUser = async () => {
  try {
    const response = await axios.get('/api/user'); // Replace with the correct API endpoint
    return response.data; // Assuming the response includes the user and role
  } catch (error) {
   
    return null; // If there's an error or no user is authenticated
  }
};



// Route guard for authentication and role-based redirection
router.beforeEach(async (to, from, next) => {
  const user = await getUser(); // Fetch the authenticated user from the API

  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!user) {
      next({ name: 'Login' }); // Redirect to login if the user is not authenticated
    } else if (user.is_admin==1 && to.name !== 'Dashboard') {
      next({ name: 'Dashboard' });
    } else if (to.name === 'FamilyDashboard' && user.role !== 'family') {
      next({ name: 'UserDashboard' }); // Redirect if the role doesn't match
    } else if (to.name === 'UserDashboard' && user.role !== 'user') {
      next({ name: 'FamilyDashboard' }); // Redirect if the role doesn't match
   
    } else {
      next(); // Proceed if everything matches
    }
  } else {
    next(); // Proceed if no auth is required
  }
});

export default router;