
<template>
    <button @click="toggleSubscription" class="btn btn-danger">
        {{ isOwner ? '' : isSubscribed ? 'Unsubscribe' : 'Subscribe' }} {{ count }} {{ isOwner ? 'Subscribers' : '' }}
    </button>
</template>

<script>
import axios from 'axios';
import numeral from 'numeral';
export default {
    props: {
            channel: {
                type: Object,
                required: true,
                default: () => ({})
            },

            initialSubscriptions: {
                type: Array,
                required: true,
                default: () => [],
            }
        },

    data: function() {
        return {
            //isSubscribed: false,
            //isLoading: false,
            subscriptions: this.initialSubscriptions,
            //subscriptionCount: 0,
            //subscriptionCountFormatted: '',
        };
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

        count() {
            return numeral(this.subscriptions.length).format('0a');
        },

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
                axios.delete(`/channels/${this.channel.id}/subscriptions/${this.subscription.id}`)
                    .then(() => {
                        this.subscriptions = this.subscriptions.filter(s => s.id !== this.subscription.id)
                    })
            } else {
                axios.post(`/channels/${this.channel.id}/subscriptions`)
                    .then(response => {
                        this.subscriptions = [
                            ...this.subscriptions,
                            response.data
                        ]
                    })
            }
        }
    }
}
</script>

Vue.component('subscribe-button', {

})
