<template>
<HeaderComponent/>

<!-- Login Section-->
<section class="py-5 bg-light" style="min-height: 90vh;">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Login</h3>
                        <form @submit.prevent="handleLogin">
                            <div class="form-group mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" class="form-control" v-model="username" placeholder="Enter your username" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password" placeholder="Enter your password" required />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" v-model="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <router-link class="btn btn-dark w-100 mt-3" :to="'/pay'">Login</router-link>
                        </form>
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
import FooterComponent from '@/shared/FooterComponent.vue';
import HeaderComponent from '@/shared/HeaderComponent.vue';

    export default {
        name: 'LoginComponent',
        components:{
            HeaderComponent,
            FooterComponent
        },
        data:()=>{
            return{
                username:'',
                password:'',
                rememberMe:false,
            }
        },
        
    }
</script>