<template>
    <div class="container">
    	<Header></Header>
    	<!-- <router-view></router-view> -->
    	<Footer></Footer>
    </div>
</template>

<script>
	import Header from './Header.vue'
	import Content from './Content.vue'
	import Footer from './Footer.vue'
    export default {
    	components: {
    		Header,
			Content,
			Footer
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
