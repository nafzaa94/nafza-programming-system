<template>
    <div>
        <form @submit.prevent="handlesubmit" class="mb-3">
            <div class="p-2 rounded" style="background-color: #0F3B4C">
                <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label" style="color: #fff">Comment</label>
                    <textarea v-model="Comment" class="form-control" id="exampleFormControlTextarea1" name="Comment" rows="2"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary" style="color: #fff">Comment</button>
                </div>
            </div>
        </form>
        <div v-for="Data in DataComment" :key="Data.id">
            <div v-if="Data.Status_delete == '0'">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div>
                                    <img class="avatar rounded-circle img-thumbnail"
                                    :src="Data.Avatar"
                                    width="30" height="30" alt="">
                                </div>
                                <div style="margin-left: 5px; margin-top: 5px">
                                    <h5>{{ Data.Username }}</h5>
                                </div>
                            </div>
                            <div>
                                <div v-if="Data.Id_user == User_id" class="btn-group">
                                    <button type="button" class="btn btn-sm"><i class="bi bi-three-dots"></i></button>
                                    <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button @click="ShowUpdateInput(Data.id)" class="dropdown-item" type="button" >Edit</button>
                                        </li>
                                                    
                                        <li>
                                            <button @click="DeleteComment(Data.id)" type="submit" class="dropdown-item">Delete</button>
                                        </li>
                                    </ul>
                                </div>
                                <div v-else class="btn-group">
                                    <button type="button" class="btn btn-sm"><i class="bi bi-three-dots"></i></button>
                                    <button type="button" class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Report</a></li>
                                    </ul>
                                </div>     
                            </div>    
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>{{ Data.Comment }}</h6>
                        <div class="input-group" v-if="InputUpdateShow[Data.id - 1].show">
                            <button @click="CloseInputUpdate(Data.id)" class="btn btn-outline-secondary" type="button"><i class="bi bi-x"></i></button>
                            <input v-model="updateData[Data.id]" type="text" class="form-control" aria-label="update" aria-describedby="button-addon2">
                            <button @click="HandleUpdate(Data.id)" class="btn btn-outline-secondary" type="button">Update</button>
                        </div>
                        <div v-if="ReplyData">
                            <div v-for="datareply in ReplyData" :key="datareply.id">
                                <div v-if="datareply.Key_reply == Data.Key_reply">
                                    <div class="card m-3 card-reply">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 style="margin-top: 8px">{{ datareply.Reply }}</h6>
                                                </div>
                                                <div class="d-flex">
                                                    <img class="avatar rounded-circle img-thumbnail"
                                                    :src="datareply.Avatar"
                                                    width="35" height="35" alt="">
                                                    <h6 style="margin-top: 8px; margin-left: 5px">{{ datareply.Username }}</h6>
                                                </div>
                                            </div>
                                            <button style="margin-right: 10px" class="like">like</button>
                                            <button @click="ShowInputTaget(Data.id, datareply.Reply)" class="reply">reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group" v-if="InputShow[Data.id - 1].show">
                            <input v-model="replyData[Data.id]" type="text" class="form-control" placeholder="Reply" aria-label="Reply" aria-describedby="button-addon2">
                            <button @click="HandleReply(Data.id, Data.Key_reply)" class="btn btn-outline-secondary" type="button" >Reply</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button style="margin-right: 10px" class="like">like</button>
                        <button @click="ShowInput(Data.id)" class="reply">reply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ViewCommentDiscussionFypComponent',
        data() {
            return {
                Key_post: null,
                User_id: null,
                Username: null,
                DataComment: [],
                replyData: [],
                ReplyData: [],
                InputShow: [],
                updateData: [],
                InputUpdateShow: [],
                Comment: null,
                Key_comment: null,
                Id_user: null,
                messages: null,
            }
        },
        methods: {
            async reqcomment() {
                await axios.get('/api/comment')
                .then(response => {
                    console.log(response.data)
                    let count = response.data.length
                    for (let i = 0; i < count; i++) {
                        let idcode = response.data[i].id
                        //console.log(idcode)
                        this.InputShow.push({
                            id: i,
                            show: false,
                        })
                        this.InputUpdateShow.push({
                            id: i,
                            show: false,
                        })
                    }

                    axios.post('/api/commentdiscussionfyp', {
                        key: this.Key_post,
                    })
                    .then(response => {
                    //console.log(response.data)
                    this.DataComment = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
                })
                .catch(error => {
                    console.log(error)
                })
            },

            async reqreply() {
                await axios.get('/api/replydiscussionfyp')
                .then(response => {
                    //console.log(response.data)
                    this.ReplyData = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            },

            async ShowInput(id) {
                //console.log(id)
                this.InputShow[id - 1].show = !this.InputShow[id - 1].show
                //console.log(this.InputShow)

            },

            async ShowInputTaget(id, keyreply) {
                //console.log(id, keyreply)
                this.InputShow[id - 1].show = !this.InputShow[id - 1].show
                //console.log(this.InputShow)

            },

            async ShowUpdateInput(id) {
                console.log(id)
                this.InputUpdateShow[id - 1].show = !this.InputUpdateShow[id - 1].show
                //console.log(this.InputShow)
                await axios.post('/api/callbackdatacommentdiscussionfyp', {
                    id: id,
                })
                .then(response => {
                    //console.log(response.data)
                    this.updateData[id] = response.data.Comment
                    this.reqcomment()
                })
                .catch(error => {
                    console.log(error)
                })

            },

            async HandleReply(id, keyreply) {
                //console.log(id, keyreply, this.replyData[id], this.Username)
                await axios.post('/api/createreplydiscussionfyp', {
                    Id_user: this.User_id,
                    Username: this.Username,
                    Key_reply: keyreply,
                    Reply: this.replyData[id],
                })
                .then(response => {
                    console.log(response.data)
                    this.replyData[id] = ''
                    this.reqcomment()
                    this.reqreply()

                })
                .catch(error => {
                    console.log(error)
                })
            },

            async HandleUpdate(id) {
                //console.log(id, keyreply, this.replyData[id], this.Username)
                await axios.post('/api/updatecommentdiscussionfyp', {
                    id: id,
                    Comment: this.updateData[id],
                })
                .then(response => {
                    //console.log(response.data)
                    this.InputUpdateShow[id - 1].show = false
                    this.reqcomment()
                    this.reqreply()

                })
                .catch(error => {
                    console.log(error)
                })
            },

            async CloseInputUpdate(id) {
                this.InputUpdateShow[id - 1].show = false
            },

            async DeleteComment(id)
            {
                const dataconfirm = confirm('Are you sure want to delete this comment?')

                if (dataconfirm) {
                    await axios.post('/api/deletecommentdiscussionfyp', {
                        id: id,
                    })
                    .then(response => {
                        //console.log(response.data)
                        this.reqcomment()
                        this.reqreply()
                    })
                    .catch(error => {
                        console.log(error)
                    })
                }

            },


            handlesubmit()
            {
                axios.post('/api/discussionfyp/comment', {
                    Key_comment: this.Key_comment,
                    Comment: this.Comment,
                    Id_user: this.Id_user,
                    Username: this.Username,
                }).then(response => {
                    this.Comment = null;
                    this.Key_comment = null;
                    this.Id_user = null;
                    this.Username = null;
                    this.reqcomment();
                    this.reqreply();

                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
            }

        },
        mounted() {
            let KeyPost = document.getElementById('Key_post').value;
            let UserId = document.getElementById('User_id').value;
            let Uname = document.getElementById('Username').value;
            //console.log(KeyPost);
            this.Key_post = KeyPost;
            this.User_id = UserId;
            this.Username = Uname;
            this.Id_user = UserId;
            this.Key_comment = KeyPost;
            this.reqcomment();
            this.reqreply();

            var pusher = new Pusher('5027a4768783a0f27bfd', {
            cluster: 'ap1'
            });

            var channel = pusher.subscribe('community-discussion-fyp');
            channel.bind('App\\Events\\CommunityDiscussionFyp', function(data) {
                console.log(data.message);
                //this.messages = data.message;
                this.reqcomment();
                this.reqreply();
            }.bind(this));

        }
    }
</script>

<style>
    :hover.like{
        text-decoration: underline;
    }
    :hover.reply{
        text-decoration: underline;
    }
    .card-reply{
        background-color: #CDCDCD;
    }
</style>
