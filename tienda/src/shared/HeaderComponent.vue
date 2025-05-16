<template>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="http://localhost:8000/img/logo.jpg" alt="" style="height: 3vw;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><router-link class="nav-link active" aria-current="page" to="/">Home</router-link></li>
                        <li class="nav-item" v-if="user==null"><router-link class="nav-link" to="/login">Login</router-link></li>

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
            <div>
                <div class="nav-item dropdown" v-if="user!=null" style="margin-right: 2.2rem;">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="cart-count">{{ user.name }}</span>
                        <img :src="url+'img/users/'+user.img" alt="user" width="40px" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><router-link class="dropdown-item" to="/profile">My profile</router-link></li>
                        <li><button class="dropdown-item" @click="logout()">Logout</button></li>
                    </ul>
                </div>
            </div>
        </nav>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
    export default {
        name: 'HeaderComponent',
        data:()=>{
            return{
                categorias:[],
                loaded:false,
                user: null,
                url: 'http://localhost:8000/',
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
            },

            logout(){
                Swal.fire({
                    tile:'¿Estás seguro?',
                    text:'¿Quieres cerrar sesión?',
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonColor:'#3085d6',
                    cancelButtonColor:'#d33',
                    confirmButtonText:'Sí, cerrar sesión'
                }).then((result)=>{
                    if(result.isConfirmed){
                        localStorage.removeItem('token')
                        localStorage.removeItem('user')
                        this.user=null
                        this.$router.push('/login')
                        this.$router.push('/login')
                    }
                })



                
            }
        },
        mounted(){
            this.refresh()
            if(localStorage.getItem('user')!=null){
                this.user=JSON.parse(localStorage.getItem('user'))
            }else{
                this.$router.push('/login')
            }
        }
    }
    
</script>