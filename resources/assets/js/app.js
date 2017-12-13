

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notifications', require('./components/notifications/new-user-added.vue'));
Vue.component('chargebacks-chart', require('./components/charts/chargebacks.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            credentials: '',
            customerId: '',
            checked: false,
            settings: [],
            notifications: [],
            count: 0,
            languages: [],
            customer: {
                firstname: '',
                lastname: '',
                email: '',
                phone: '',
                address1: '',
                address2: '',
                city: '',
                us_state: '',
                zippostal_code: '',
                country: '',
            },
            cc: {
                firstname: '',
                lastname: '',
                email: '',
                phone: '',
                address1: '',
                address2: '',
                city: '',
                us_state: '',
                zippostal_code: '',
                country: '',
            },
            cempty: {
                firstname: '',
                lastname: '',
                email: '',
                phone: '',
                address1: '',
                address2: '',
                city: '',
                us_state: '',
                zippostal_code: '',
                country: '',
            }
        }
    },

    methods: {
        fetchCustomer() {
            let id = this.customerId
            axios.get('/customersData/'+id)
                .then((response) => {
                    console.log(response.data)
                    this.customer = response.data
                })
        },
        sameShipping() {
            this.checked == true ? this.cc = this.customer : this.cc = this.cempty
        },
        fetchLanguage() {
            axios.get('/language-all')
                .then((response) => {
                    this.languages = response.data
                })
        },
        getCredentials() {
            axios.get('/credentials')
                .then((response) => {
                    const creds = response.data
                    console.log('credentials:' + creds)
                    // let url = 'https://jsonplaceholder.typicode.com/posts'
                    let url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
                    let header = {
                        'Authorization': 'Basic ' + creds
                    }
                    axios.get(url, {headers: header})
                        .then((response) => {
                            console.log('response:'+response)
                        })
                })
        }
    },

    mounted() {
        this.fetchLanguage()
    }
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 6000);

window.confirmDelete = (e, obj) => {
	const href = obj.getAttribute("href");
    var r = confirm("This will delete the item. Click OK to continue or Cancel to abort!");

    if (r == true) {
        const form = document.getElementById("confirmDelete");
        form.action = href;
        form.submit();
    }

    e.preventDefault();

    return false;
}

$('.num-input').keypress(function(event) {
    var $this = $(this);
    if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
       ((event.which < 48 || event.which > 57) &&
       (event.which != 0 && event.which != 8))) {
           event.preventDefault();
    }

    var text = $(this).val();
    if ((event.which == 46) && (text.indexOf('.') == -1)) {
        setTimeout(function() {
            if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
            }
        }, 1);
    }

    if ((text.indexOf('.') != -1) &&
        (text.substring(text.indexOf('.')).length > 2) &&
        (event.which != 0 && event.which != 8) &&
        ($(this)[0].selectionStart >= text.length - 2)) {
            event.preventDefault();
    }
});

$('.num-input').bind("paste", function(e) {
    var text = e.originalEvent.clipboardData.getData('Text');
    if ($.isNumeric(text)) {
        if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
            e.preventDefault();
            $(this).val(text.substring(0, text.indexOf('.') + 3));
       }
    }
    else {
        e.preventDefault();
     }
});

// Use for adding/editing merchant processor fees
var link = $('#edit-merchant-processor');
var href = link.data('link');
$('.select-merchant-processor').change(function(){
    if (this.value) {
        link.attr('href', href + `/${this.value}/fees/edit`);
    } else {
        link.attr('href', '#');
    }
})
