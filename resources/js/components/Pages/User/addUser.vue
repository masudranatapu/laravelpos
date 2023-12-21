<template>
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="storeUser">
                    <div class="modal-body">
                        <div class="from-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" v-model="users.name" placeholder="User name">
                        </div>
                        <div class="from-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" v-model="users.email" placeholder="Email">
                        </div>
                        <div class="from-group">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" v-model="users.phone" placeholder="Phone number">
                        </div>
                        <div class="from-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" v-model="users.password" placeholder="Password">
                        </div>
                        <div class="from-group">
                            <label for="">Address</label>
                            <textarea cols="30" rows="3" class="form-control" v-model="users.address" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="isDisable">
                            {{ isDisable ? 'Submit ....' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: function () {
            return {
                isDisable: false,
                users: {},
            };
        },
        methods: {
            storeUser() {
                this.isDisable = true;
                axios.post('/user/store', this.users).then((response) => {
                    console.log(response.data);
                    if(response.data.type == 'Success') {
                        this.isDisable = false;
                        console.log(response.data.massage);
                        this.$emit('userAdded');
                        this.users = {};
                        $("#addUser").modal('hide');
                        
                    }else {
                        console.log(response.data.massage);
                    }
                }).catch((error) => {
                    
                    console.log(error.response, error.response.data, error.response.data.errors);
                    
                    this.isDisable = false;
                    
                    if (error.response && error.response.data && error.response.data.errors) {
                        const errors = error.response.data.errors;
                        Object.keys(errors).forEach((key) => {
                            errors[key].forEach((errorMessage) => {
                                console.log(`${errorMessage}`);
                            });
                        });
                    }
                });
            }
        },
    }
</script>