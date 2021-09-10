import numeral from 'numeral';

Vue.component('subscribe-button', {
    props: {
        channel: {
            type: Object,
            required: true,
            default: () => ({})
        },

        subscriptions: {
            type: Array,
            required: true,
            default: () => [],
        }
    },

    computed: {
        isSubscribed() {
            // Check if che user is logged in or is the owner of the channel
            if(! __auth() || this.channel.user_id === __auth().id) return false;

            return this.subscriptions.find(subscription => subscription.user_id === __auth().id);
        },

        isOwner() {
            if(__auth() && this.channel.user_id === __auth().id) return true;

            return false;
        },
        count() {
            return numeral(this.subscriptions.length).format('0a');
        }
    },

    methods: {
        toggleSubscription() {
            if(! __auth()){
                alert('You must be logged in to subscribe');
            }
        }
    }
})
