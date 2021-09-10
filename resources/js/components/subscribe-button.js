import axios from 'axios';
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

            return !!this.subscription;
        },

        isOwner() {
            if(__auth() && this.channel.user_id === __auth().id) return true;

            return false;
        },

        subscription(){
            if(! __auth()) return null;

            return this.subscriptions.find(subscription => subscription.user_id === __auth().id);
        },

        unsubscribe() {
            axios.delete(`/channels/${this.channel.id}/subscriptions/${this.subscription.id}`);
        },

        subscribe() {
            axios.post(`/channels/${this.channel.id}/subscriptions/`);
        },

        count() {
            return numeral(this.subscriptions.length).format('0a');
        }
    },

    methods: {
        toggleSubscription() {
            if(! __auth()){
                return alert('You must be logged in to subscribe');
            }

            if(this.isOwner){
                return alert('You cannot subscribe to your own channel');
            }

            if(this.isSubscribed) {
                this.unsubscribe;
            } else {
                this.subscribe;
            }
        }
    }
})
