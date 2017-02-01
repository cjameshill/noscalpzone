export default {

    selected: [],
    paymentProcessing: false,
    status: '',
    paymentSuccess: false,
    form: {
        email: 'cjameshill@gmail.com',
        number: '',
        exp: {
            month: '',
            year: ''
        },
        cvc: '',
        zip: ''
    },
    stripe: {
        stripeToken: '',
        stripeEmail: ''
    },

    select(set) {
        this.selected = set;
    }

}