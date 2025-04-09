<template>
    <HeaderComponent/>

       <!-- Movie/Show Details Section -->
       <section class="py-5" style="min-height: 90vh;" v-if="detalles!=null">
            <div class="container">
                <div class="row">
                    <!-- Imagen de la película/serie/documental -->
                    <div class="col-md-4">
                        <img :src="url+'uploads/img/'+detalles.img" alt="Poster de la película/serie" class="img-fluid rounded">
                    </div>
                    <!-- Información de la película/serie/documental -->
                    <div class="col-md-8">
                        <h1>{{detalles.title}}</h1>
                        <p style="font-size: 1.3rem;"><strong>Género:</strong> Acción, Aventura</p>
                        <p style="font-size: 1.3rem;"><strong>Duración:</strong> 2h 30m</p>
                        <p style="font-size: 1.3rem;"><strong>Fecha de lanzamiento:</strong> {{detalles.created_at}}</p>
                        <p style="font-size: 1.3rem;"><strong>Calificación:</strong> ★★★★☆ (4/5)</p>
                        <p style="font-size: 1.3rem;"><strong>Descripción:</strong><br> {{detalles.description}}</p>
                        <h4>Reparto Principal:</h4>
                        <ul>
                            <li>Actor 1</li>
                            <li>Actor 2</li>
                            <li>Actor 3</li>
                        </ul>
                        <!-- Botón para ver contenido -->
                        <router-link :to="'/video'" class="btn btn-primary">Ver Ahora</router-link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
    <FooterComponent/>

</template>

<script>
    import HeaderComponent from '@/shared/HeaderComponent.vue';
import FooterComponent from '@/shared/FooterComponent.vue';
import axios from 'axios';
import {useRoute} from 'vue-router'

    export default {
        name: 'ProductSingleComponent',
        components:{
            HeaderComponent,
            FooterComponent
        },
        data:()=>{
            return{
                detalles:null,
                loaded:false,
                url:'http://localhost:8000/'
            }
        },
        methods:{
            refresh(){
                const route=useRoute()
                this.loaded=false
                console.log(route.params.id)
                axios.get('products/'+route.params.id).then((response)=>{
                    this.detalles=response.data.data
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