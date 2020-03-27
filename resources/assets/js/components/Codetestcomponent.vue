<template>
    <div id="customer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <input v-model="query" type="text" class="form-control" placeholder="Search here...">

                            </div>
                            <div class="col-lg-3">
                                <select v-model="queryFiled"   @change="searchData()"  class="form-control">
                                    <option value="">Please Select...</option>
                                    <option v-for="group in groupData" :value="group.type">
                                        {{group.type.toUpperCase()}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <datepicker v-model="date_search"  name="birthdate"></datepicker>
                            </div>

                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Group Name</th>
                                    <th>Group Type</th>
                                    <th>Account Name</th>
                                    <th>Post Text</th>
                                    <th>Time</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr v-show="bufferingpost.length"  v-for="(post, index) in bufferingpost" :key="post.id">
                                    <td>{{ post.group.name }}</td>
                                    <td>{{ post.group.type }}</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="">
                                                    <img width="50" class="media-object img-circle"
                                                         v-bind:src="post.account.avatar"/>
                                                </a>
                                            </div>
                                            <div class="media-body media-middle" style="width: 180px;">
                                                <h4 class="media-heading">{{ post.account.name }}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ post.post_text }}</td>
                                    <td>{{ post.created_at }}</td>
                                </tr>

                                <tr v-show="!bufferingpost.length">
                                    <td colspan="6">
                                        <div class="alert alert-danger" role="alert">Sorry :( No data found).</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <pagination
                                    v-if="pagination.last_page > 1"
                                    :pagination="pagination"
                                    :offset="5"
                                    @paginate="query === '' ? getData() : searchData()"
                            ></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->


    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker'
    export default {
        components: {
            Datepicker
        },
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                query: "",
                keywords: "",
                queryFiled: "",
                bufferingpost: [],
                groupData: {},
                pagination: {
                    current_page: 1
                },
                date_search: '',
            };
        },
        watch: {
            query: function(newQ, old) {
                if (newQ === "") {
                    this.getData();
                } else {
                    this.searchData();
                }
            },
            date_search(after, before) {
                this.searchData();
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                 axios
                    .get("/api/codetest?page=" + this.pagination.current_page)
                    .then(response => {
                        this.bufferingpost = response.data.data;
                        this.pagination = response.data;
                     })
                    .catch(e => {
                        console.log(e);
                     });
            },
            searchData(event) {
                 axios
                    .get(
                        "/api/search/codetest?keword=" + this.query  +
                        "&&group=" + this.queryFiled +
                        "&&date_search=" + this.date_search +
                        "&&page=1"
                    )
                    .then(response => {
                        this.bufferingpost = response.data.data;
                        this.pagination = response.data;
                     })
                    .catch(e => {
                        console.log(e);
                     });
                axios.get('/groupData')
                    .then(response => this.groupData = response.data)
                    .catch(error => {
                    });
            },
            reload() {
                this.getData();
                this.query = "";
                this.date_search = "";
                this.queryFiled = "name";
             },

        }
    };
</script>
