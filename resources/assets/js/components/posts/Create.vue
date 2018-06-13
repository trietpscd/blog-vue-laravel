<template>
	<div id="post-create" class="form-post">
		<form method="post" role="form" @submit="createPost()" >
            <legend>Post create</legend>
        
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="text" name="text" placeholder="Input field" v-model="post.title">
                <span class="help-block" v-if="error && errors.title">{{ errors.title[0] }}</span>
            </div>
            
            <div class="form-group">
                <label for="comment">Body:</label>
                <textarea class="form-control" rows="5" id="comment" name="body" v-model="post.body"></textarea>
                <span class="help-block" v-if="error && errors.body">{{ errors.body[0] }}</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="button" class="btn btn-danger">Cancel</button>
        </form>
	</div>
</template>
<script>
    import axios from 'axios'
    export default {
        mounted() {
            console.log('Create Post')
        },
        data() {
        	return {
                post: {
                    title: '',
                    body: '' 
                },
                errors: {},
                error: false

        		
        	}
        },
        methods:{
            createPost() {
                event.preventDefault();
                axios.post('/posts',{
                    title: this.post.title,
                    body: this.post.body
                })
                    .then( (reps) => {
                        console.log(reps);
                        if (reps.data.status === 'success') {
                            this.$router.push({path: '/posts'});
                        }
                        if (reps.data.status === 'error') {
                            this.error = true
                            this.errors = reps.data.error
                            console.log(this.errors);
                        }
                        
                    })
                    .catch( (reps) => {
                        console.log(reps);
                    })
            }
        }
    }
</script>
