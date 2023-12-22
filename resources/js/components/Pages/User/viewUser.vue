<template>
    <div class="modal fade" id="viewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="userData">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="ml-4 mb-0 fa-ul">
                                <li class="small">
                                    <span class="fa-li">
                                    <i class="fas fa-lg fa-user"></i>
                                    </span>
                                    Name: {{ userData.name }}
                                </li>
                                <li class="small">
                                    <span class="fa-li">
                                    <i class="far fa-envelope"></i>
                                    </span>
                                    Email: <a href="mailto:{{ userData.email }}">{{ userData.email }}</a>
                                </li>
                                <li class="small">
                                    <span class="fa-li">
                                        <i class="fas fa-lg fa-phone"></i>
                                    </span>
                                    Phone : <a href="tel:{{ userData.phone }}">{{ userData.phone }}</a>
                                </li>
                                <li class="small">
                                    <span class="fa-li">
                                    <i class="fas fa-lg fa-building"></i>
                                    </span>
                                    Address: {{ userData.address }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            userData: {
                type: Object,
                default: null,
            }
        },
    }
</script>