<template>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="http://localhost:8000/img/logo.jpg" alt="" style="height: 3vw;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><router-link class="nav-link active" aria-current="page" to="/">Home</router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/login">Login</router-link></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Search</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All</a></li>
                                <li v-for="cat in categorias" :key="cat.id"><a class="dropdown-item" href="#!">{{cat.category}}</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
import axios from 'axios';
    export default {
        name: 'HeaderComponent',
        data:()=>{
            return{
                categorias:[],
                loaded:false,
            }
        },
        methods:{
            refresh(){
                this.loaded=false
                axios.get('index').then((response)=>{
                    //console.log("Respuesta desde el Backend",response.data)
                    this.categorias=response.data.categorias
                }).catch((error)=>{
                    console.log("Error", error)
                }).finally(()=>{
                    this.loaded=true
                })
            }
        },
        mounted(){
            this.refresh()
        }
    }
    
</script>