import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

import 'bootstrap-icons/font/bootstrap-icons.css';
