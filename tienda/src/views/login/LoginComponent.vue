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
                        <form>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" v-model="email" placeholder="Enter your email" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password" placeholder="Enter your password" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" v-model="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <Button @click="handleLogin()" class="btn btn-dark w-100 mt-3" type="button">Login</Button>
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
//import { Button } from 'bootstrap';
import axios from 'axios';

    export default {
        name: 'LoginComponent',
        components:{
            HeaderComponent,
            FooterComponent
        },
        data:()=>{
            return{
                email:'user2@email.com',
                password:'admin2',
                rememberMe:false,
                detalles:null,
            }
        },
        methods:{
            handleLogin() {
                if (this.email.trim() == '' || this.password.trim() == '') {
                    alert('Please fill in all fields.');
                    return;
                }else{
                    axios.post('login',{
                        email:this.email,
                        password:this.password
                    }).then(response=>{
                        console.log('Inicio de sesión exitoso:', response.data);
                        if(response.data.active == 1){
                            localStorage.setItem('token', response.data.token);
                            localStorage.setItem('user', JSON.stringify(response.data.user));
                            this.$router.push('/home');
                        }else{
                            this.$router.push('/pay');
                        }

                    }).catch(error=>{
                        console.error('Error al iniciar sesión:', error);
                    });



                }
            
                // Redirigir al usuario a otra página después de iniciar sesión
                //
            }
        }
        
    }
</script>