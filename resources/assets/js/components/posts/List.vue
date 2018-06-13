<template>
	<div class="post">
		<div class="form-group">
			<router-link class="btn btn-primary" :to="{name: 'PostCreate'}">Create Post</router-link>
		</div>
		
	    <div v-if="posts && posts.length">
	    	<div v-for="post, index in posts">
		    	<div class="panel panel-primary">
		    		<div class="panel-heading">
		    			<h3 class="panel-title">{{ post.title }}</h3>
		    		</div>
		    		<div class="panel-body">
		    			 {{ post.body }}
		    		</div>
		    		<div class="panel-footer">
		    			<router-link class="btn btn-info" :to="{name: 'PostView', params: {id: post.id}}">View</router-link>
		    			<router-link class="btn btn-success" :to="{name: 'PostUpdate', params: {id: post.id}}">Update</router-link>
		    			<button  class="btn btn-danger" @click="deletePost(post.id, index)">Delete</button>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	    <div v-if="posts && posts.length">
	    	<div v-for="error in errors">
		    	<div class="panel panel-danger">
		    		<div class="panel-heading">
		    			<h3 class="panel-title">{{ Error }}</h3>
		    		</div>
		    		<div class="panel-body">
		    			 {{ error.msg }}
		    		</div>
		    	</div>
	    	</div>
	    </div>
	</div>
</template>

<script>
	import axios from 'axios';
    export default {
        data() {
            return {
                posts: [],
                errors: []
            }
        },
        mounted() {
            axios.get('/posts')
            	.then((reps) => {
            		this.posts = reps.data.result
            	})
            	.catch( (reps) => {
            		this.errors = reps.data.msg
            	});
        },
        methods: {
        	deletePost: function (id, index) {
        		axios.delete('/posts/'+id)
        			.then( (reps) => {
        				this.posts.splice(index, 1);
        			})
        			.catch( (reps) => {

        			})
        	}
        }
    }
</script>
