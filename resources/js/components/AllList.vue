<template>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h2 align="center" class="mt-5"><u>'My Awesome Lists'</u></h2>
			<div class="row">
				<div class="col-md-6">				
					<p><strong>Date: </strong>{{ moment(item).format('MMMM Do, YYYY') }}</p>
				</div>
				<div class="col-md-6 text-right">				
					<p><strong>By: </strong>Viki</p>
				</div>
			</div>
			<h5 align="left" class="my-1 ">#Add User</h5>
			<div>
				<b-form inline class="border p-3 rounded">
					<label class="sr-only" for="inline-form-input-name">Name</label>
					<b-form-input type="text" placeholder="Enter Name" v-model="awesome_list.name" name="name" id="name" v-validate="'required'" class="form-control mb-2 mr-sm-2 mb-sm-0"></b-form-input>

					<label class="sr-only" for="inline-form-input-username">Email</label>
					<b-form-input type="text" placeholder="Enter Email" v-model="awesome_list.email" name="email" id="email" v-validate="'required'" class="form-control mb-2 mr-sm-2 mb-sm-0"></b-form-input>

					<b-button variant="primary" @click="addList">Submit</b-button>
				</b-form>
			</div>

			<h5 align="left" class="my-2">#Users</h5>
			<div class="table_div" style="">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<tr v-for="awesome_list in awesome_lists" :key="awesome_list.id">
						<td>{{ awesome_list.name }}</td>
						<td>{{ awesome_list.email }}</td>
						<td width="25%">
							<router-link :to="{name: 'edit', params: {id: awesome_list.id}}" class="btn btn-info">
								Edit
							</router-link>
							<button class="btn btn-danger" @click="deleteList(awesome_list.id)">Delete</button>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</template>
<script>
	import moment from 'moment';
    export default {
        data() {
            return {
				awesome_lists: [],
				awesome_list: {}
            }
        },
        created() {
            this.axios
                .get('/api/lists')
                .then(response => {
                    this.awesome_lists = response.data;
                });
        },
        methods: {
			moment: function (date) {
				return moment(date);
			},
            deleteList(id) {
					this.$swal({
						title: "Are you sure?",
						text: "You want to delete this user !!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonText: "Yes Delete it!",
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
					}).then(result => {
						if (result.value) {
						axios.delete("/api/delete/" + id).then(response => {
							this.$swal(
								"Success",
								"User deleted successfully",
								"success"
							);
							setTimeout(function(){
								window.location.href = '/';
							},1000);
							
						});
						}
					});
			},
			addList() {  
                this.axios
                    .post('/api/store', this.awesome_list)
                    .then(response => {
						window.location.href = '/';
          				this.reset(); 
                    })
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
		},	
    }
</script>