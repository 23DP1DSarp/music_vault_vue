import { createRouter, createWebHistory } from 'vue-router'
import Main from '../views/Main.vue'
import Register from '@/views/auth/Register.vue'
import Login from '@/views/auth/Login.vue'
import AddAlbum from '@/views/AddAlbum.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'main',
      component: Main,
    },
    {
      path: '/register',
      name: 'register',
      component: Register,
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
    },
    {
      path: '/add-album',
      name: 'add-album',
      component: AddAlbum,
    },
  ],
})

export default router
