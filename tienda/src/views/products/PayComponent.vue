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
                                <!-- Card Number -->
                                <div class="form-group mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text" id="cardNumber" class="form-control" v-model="cardNumber" placeholder="Enter card number" required />
                                </div>
                                
                                <!-- Expiry Date -->
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="expiryDate" class="form-label">Expiry Date</label>
                                            <input type="month" id="expiryDate" class="form-control" v-model="expiryDate" required />
                                        </div>
                                    </div>
                                    
                                    <!-- CVV -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="cvv" class="form-label">CVV</label>
                                            <input type="password" id="cvv" class="form-control" v-model="cvv" placeholder="XXX" required />
                                        </div>
                                    </div>
                                </div>

                                <!-- Billing Address -->
                                <div class="form-group mb-3">
                                    <label for="billingAddress" class="form-label">Billing Address</label>
                                    <input type="text" id="billingAddress" class="form-control" v-model="billingAddress" placeholder="Enter billing address" required />
                                </div>
                                
                                <!-- Amount -->
                                <div class="form-group mb-3">
                                    <label for="amount" class="form-label">Total Amount</label>
                                    <input type="text" id="amount" class="form-control" v-model="amount" disabled />
                                </div>

                                <!-- Submit Button -->
                                <router-link :to="'/'" class="btn btn-dark w-100 mt-3">Pay Now</router-link>
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
    export default {
        name: 'PayComponent',
        components: {
            HeaderComponent,
            FooterComponent
        }
    }
</script>