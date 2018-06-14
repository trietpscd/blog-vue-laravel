<template>
    <div id="post-create" class="form-post">
        <form method="post" role="form" @submit="updatePost()" >
            <legend>Post update</legend>
        
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="text" name="text" placeholder="Input field" v-model="post.title" value="post.title">
                <span class="help-block" v-if="error && errors.title">{{ errors.title[0] }}</span>
            </div>
            
            <div class="form-group">
                <label for="comment">Body:</label>
                <textarea class="form-control" rows="5" id="comment" name="body" v-model="post.body">{{post.body}}</textarea>
                <span class="help-block" v-if="error && errors.body">{{ errors.body[0] }}</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        mounted() {
            console.log('Update Post')
            let id = this.$route.params.id
            axios.get('/posts/' + id)
                .then( (resp) => {
                    this.post = resp.data.result
                })
                .catch( (resp) => {
                    console.log(resp);
                })
        },
        data() {
            return {
                post: {
                },
                errors: {},
                error: false,
                success: false,
                msg:''
            }
        },
        methods:{
            updatePost() {
                event.preventDefault();
                let id = this.$route.params.id
                axios.patch('/posts/' + id, {
                    title: this.post.title,
                    body: this.post.body
                })
                    .then( (resp) => {
                        console.log(resp);
                        if (resp.data.status === "success") {
                            this.success = true
                            this.$router.push({
                                path: '/posts'
                            });
                        }
                        if (resp.data.status === "error") {
                            this.error = true
                            this.errors = resp.data.error
                        }
                    })
                    .catch( (resp) => {
                        console.log(resp);
                    })
            }
        }
    }
</script>
