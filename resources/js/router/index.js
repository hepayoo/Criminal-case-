import { createRouter, createWebHistory } from "vue-router";

import HomePage from '../pages/HomePage.vue';
import RegisterPage from '../pages/RegisterPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import Dashboard from '../pages/Dashboard.vue';
import FamilyDashboard from '../pages/FamilyDashboard.vue';
import UserDashboard from '../pages/UserDashboard.vue';
import FamilyCase from '../pages/FamilyCase.vue'; 
import FamilyAbout from '../pages/FamilyAbout.vue';
import ReportCase from '../pages/ReportCase.vue';
import FamilyCommunities from '../pages/FamilyCommunities.vue';
import FamilySingleCase from '../pages/FamilySingleCase.vue';
import FamilyShareCase from '../pages/FamilyShareCase.vue';
import FamilyVictim from '../pages/FamilyVictim.vue';
import CaseManagement from '../pages/CaseManagement.vue';
import CreateCase from "../pages/CreateCase.vue";
import UserShareCase from '../pages/UserShareCase.vue';
import UserVictim from '../pages/UserVictim.vue';

import UserCase from '../pages/UserCase.vue'; 
import UserAbout from '../pages/UserAbout.vue';
import UserCommunities from '../pages/UserCommunities.vue';
import UserSingleCase from '../pages/UserSingleCase.vue';

import EditCases from '../pages/EditCases.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomePage, 
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterPage,
    meta: { requiresGuest: true }
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage,
    meta: { requiresGuest: true }
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
    meta: { requiresAuth: true, isAdmin: true },
  },
  {
    path: "/casemanagement",
    name: "CaseManagement",
    component: CaseManagement,
  },
  {
    path: "/createcase",
    name: "CreateCase",
    component: CreateCase,
  },
  {
    path: "/cases/:slug/edit",
    name: "EditCases",
    component: EditCases,
    meta:{requiresAuth:true},
    props:true
    
},
  {
    path: '/family-dashboard',
    name: 'FamilyDashboard',
    component: FamilyDashboard,
    meta: { requiresAuth: true },
    children: [
      { path: 'case', name: 'FamilyCase', component: FamilyCase }, // Fixed
      { path: 'about', name: 'FamilyAbout', component: FamilyAbout },
      { path: 'communities', name: 'FamilyCommunities', component: FamilyCommunities  },
      { path: 'reportcase', name: 'ReportCase', component: ReportCase },
      { path: 'sharecase', name: 'FamilyShareCase', component: FamilyShareCase},
      { path: 'victim/:slug', name: 'FamilyVictim', component: FamilyVictim, props: true },
      { path: 'singlecase/:slug', name: 'FamilySingleCase', component: FamilySingleCase, props: true },
    ]
  },
  {
    path: '/user-dashboard',
    name: 'UserDashboard',
    component: UserDashboard,
    meta: { requiresAuth: true },
    children: [
      { path: 'case', name: 'UserCase', component: UserCase }, 
      { path: 'about', name: 'UserAbout', component: UserAbout },
      { path: 'communities', name: 'UserCommunities', component: FamilyCommunities },
      {path: 'sharecase', name: 'UserShareCase', component: UserShareCase},
      { path: 'victim/:slug', name: 'UserVictim', component: UserVictim, props: true },
      { path: 'singlecase/:slug', name: 'UserSingleCase', component: UserSingleCase, props: true },
    ]
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const getUser = async () => {
  try {
    const response = await axios.get('/api/user'); 
    return response.data;
  } catch (error) {
    return null;
  }
};

router.beforeEach(async (to, from, next) => {
  const user = await getUser(); 

  
  if (to.matched.some(record => record.meta.requiresAuth)) {
    
    if (!user) {
     
      return next({ name: 'Login' });
    }

    
    if (user.is_admin == 1 && !['Dashboard', 'CreateCase', 'EditCases'].includes(to.name)) {
      return next({ name: 'Dashboard' }); 
    }

   
    if (to.path.startsWith('/family-dashboard') && user.role !== 'family') {
     
      return next({ name: 'UserDashboard' });
    }

   
    if (to.path.startsWith('/user-dashboard') && user.role !== 'user') {
     
      return next({ name: 'FamilyDashboard' });
    }

   
    return next();
  }

 
  next();
});



export default router;
