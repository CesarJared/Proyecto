import { createRouter, createWebHistory } from "vue-router";
import HomeComponent from "@/views/home/HomeComponent.vue";
import ContactComponent from "@/views/contact/ContactComponent.vue";
import ProductSingleComponent from "@/views/products/ProductSingleComponent.vue";
import VideoComponent from "@/views/products/VideoComponent.vue";
import LoginComponent from "@/views/login/LoginComponent.vue";
import PayComponent from "@/views/products/PayComponent.vue";
//const HomeComponent =

const routes = [
    {'path': '/', name:"index", component:HomeComponent},
    {'path': '/contact', name:"contact", component:ContactComponent},
    {'path': '/product/show/:id', name:"product", component:ProductSingleComponent},
    {'path': '/login', name:"login", component:LoginComponent},
    {'path': '/pay', name:"pay", component:PayComponent},
    {'path': '/video', name:"video", component:VideoComponent},
    {'path': '/:pathMatch(.*)*', name:"notfound", component:HomeComponent}, // 404 page
    
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;