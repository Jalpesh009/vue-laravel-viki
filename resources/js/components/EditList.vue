<template>
    <div>
        <h3 class="text-center mt-4">Edit Awesome List</h3>
        <div class="row">
            <div class="col-md-8 offset-md-2">                
                <div class="text-right pb-3">
                    <router-link :to="{name: 'home'}"> 
                    <b-button variant="success" tag="button">
                        <i class="fa fa-arrow-left"></i> Back
                    </b-button>      
                    </router-link>      
                </div>

                <form @submit.prevent="updateList">
                    <div class="form-group">
                        <label>Name</label>
                        <b-form-input type="text" class="form-control" v-model="awesome_list.name"></b-form-input>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <b-form-input type="email" class="form-control" v-model="awesome_list.email"></b-form-input>
                    </div>
                    <button type="submit" class="btn btn-primary">Update List</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                awesome_list: {}
            }
        },
        created() {
            this.axios
                .get(`/api/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.awesome_list = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateList() {
                this.axios
                    .post(`/api/update/${this.$route.params.id}`, this.awesome_list)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>