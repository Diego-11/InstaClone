<template>
    <div class="container">
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText">Follow</button>
    </div>
</template>

<script>
    export default {

        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {

            return {
                
                status: this.follows,
            }
        },

        methods: {

            followUser() {

                axios.post('/follow/' + this.userId)
                    .then(res => {

                        console.log(res.data);

                        this.status = !this.status;
                    })
                    .catch( err => {

                        console.log(err);

                        if (err.response.status == 401) {

                            window.location = '/login';
                        }
                    })
            }
        },

        computed : {

            buttonText() {

                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>
