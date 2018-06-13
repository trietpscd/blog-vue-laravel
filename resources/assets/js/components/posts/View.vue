<template>
	<div>
		<div class="panel panel-default">
            <div class="panel-body">
                <p>Title: {{post.title}}</p>
                <p>Body: {{post.body}}</p>
            </div>
        </div>
	</div>
</template>
<script>
    import axios from 'axios'
    export default {
        mounted() {
            let id = this.$route.params.id;
            axios.get('/posts/'+id)
            .then( (reps) => {
                this.post = reps.data.result
            })
            .catch( (reps) => {
                this.error = reps.data.msg
            })
        },
        data() {
        	return {
        		post: [],
                error: []
        	}
        }
    }
</script>
