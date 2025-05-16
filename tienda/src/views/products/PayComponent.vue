<template>
        <HeaderComponent/>
        <section class="py-5 bg-light" style="min-height: 90vh;">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4">Payment Details</h3>
                            <form>
                                <!-- Submit Button -->
                                <div id="btnPayPal"></div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <FooterComponent/>
</template>

<script>
    import HeaderComponent from '@/shared/HeaderComponent.vue';
    import FooterComponent from '@/shared/FooterComponent.vue';
    import { loadScript } from '@paypal/paypal-js';
    import router from '@/router';

    export default {
        name: 'PayComponent',
        components: {
            HeaderComponent,
            FooterComponent
        },
        mounted() {
            this.pagar();
        },
        methods:{
            pagar(){
                loadScript({
                    'clientId':'AauWeV028dEoKplMZglyQeSxFvlVDRtatRU_obqwvIqBn2osDAyUDdgGlkMbK0xZ1t8tBp-3Nc6h-oDC',
                    'currency': 'MXN',
                }).then((paypal)=>{
                    paypal.Buttons({
                        createOrder:this.createOrder,
                        onApprove:this.onApprove,
                    }).render('#btnPayPal')
                })
            },
            createOrder(data, actions){
                console.log('createOrder', data, actions);
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: '100.00',
                        },
                    }]
                }).then(function(orderId){
                    console.log('orderId', orderId);
                    return orderId;
                })
            },
            onApprove(data, actions){
                console.log('onApprove', data, actions);
                alert('Payment successful!');
                return actions.order.capture().then(function(details){
                    console.log('Transaction completed by', details.payer.name.given_name);
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    router.push('/')
                })
            }

        }
    }
</script>