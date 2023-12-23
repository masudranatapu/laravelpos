<template>
    <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" v-if="users">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Update User
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="updateUser(users.id)">
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
                            <label for="">Address</label>
                            <textarea cols="30" rows="3" class="form-control" v-model="users.address" placeholder="Address"></textarea>
                        </div>
                        <div class="from-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" v-model="users.password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" :disabled="isDisable">
                            {{ isDisable ? 'Update ....' : 'Update' }}
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
        props : {
            users:  {
                type: Object,
                default: null,
            }
        },
        data: function () {
            return {
                isDisable: false,
            };
        },
        methods: {
            updateUser(id) {
                
                this.isDisable = true;
                axios.post(`/user/update/${id}`, this.users).then((response) => {
                    // response.log(response);
                    if(response.data.type == "Success") {
                        this.isDisable = false;
                        this.$emit('userUpdated');

                        $("#updateUser").modal('hide');
                    }else {
                        // console.log(response.data.massage);
                    }
                }).catch((error) => {
                    
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