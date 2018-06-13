<template>
	<div>
		<h1>{{ title }}</h1>
	</div>
</template>
<script>
    export default {
        mounted() {
            console.log('Update Post')
        },
        data() {
        	return {
        		title: 'Update Post'
        	}
        }
    }
</script>
