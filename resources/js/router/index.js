import { createRouter, createWebHistory } from "vue-router";

import HomePage from '../pages/HomePage.vue';
import RegisterPage from '../pages/RegisterPage.vue';
import LoginPage from '../pages/LoginPage.vue';
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
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;