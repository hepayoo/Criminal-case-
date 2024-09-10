import { createRouter, createWebHistory } from "vue-router";

import HomePage from '../pages/HomePage.vue';
import RegisterPage from '../pages/RegisterPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import Dashboard from '../pages/Dashboard.vue';
import FamilyDashboard from '../pages/FamilyDashboard.vue';
import UserDashboard from '../pages/UserDashboard.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomePage, // Displays "Hello Vue" and the Register button
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterPage, // Displays the Register page
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage, // Displays the Register page
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
},

{
    path: '/family-dashboard',
    name: 'FamilyDashboard',
    component: FamilyDashboard,
    meta: { requiresAuth: true },
  },
  {
    path: '/user-dashboard',
    name: 'UserDashboard',
    component: UserDashboard,
    meta: { requiresAuth: true },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});



// Function to get the authenticated user
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