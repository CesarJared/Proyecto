<template>
    <!-- Navigation-->
    <HeaderComponent />
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5" style="min-height: 90vh;">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                    <div class="col mb-5" v-for="product in ultimos" :key="product.id">
                        <div class="card" style="height: fit-content;">
                            <!-- Product image-->
                            <img class="card-img-top" :src="url+'uploads/img/'+product.img" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ product.title }}</h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><router-link class="btn btn-outline-dark mt-auto w-100" :to="'/product/show/'+product.id">Watch</router-link></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Footer-->
        <FooterComponent />
        
</template>

<script>
import HeaderComponent from '@/shared/HeaderComponent.vue';
import FooterComponent from '@/shared/FooterComponent.vue';
import axios from 'axios';

    export default {
        name: 'HomeComponent',
        components:{
            HeaderComponent,
            FooterComponent
        },
        data:()=>{
            return{
                ultimos:[],
                loaded:false,
                url:'http://localhost:8000/'
            }
        },
        methods:{
            refresh(){
                this.loaded=false
                axios.get('index').then((response)=>{
                    this.ultimos=response.data.ultimos
                }).catch((error)=>{
                    console.log("Error", error)
                }).finally(()=>{
                    this.loaded=true
                })
            }
        },
        mounted(){
            this.refresh();
        },
    }
</script>