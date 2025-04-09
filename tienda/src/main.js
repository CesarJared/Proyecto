import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import './template/css/styles.css'
import router from './router'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/'

createApp(App).use(router).mount('#app')
