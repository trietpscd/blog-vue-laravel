<template>
    <div class="container">
    	<Header></Header>
    	<Content></Content>
    	<Footer></Footer>
    </div>
</template>

<script>
	import Header from './Header.vue'
	import Content from './Content.vue'
	import Footer from './Footer.vue'
    import { EventBus } from './event-bus.js'
    export default {
    	components: {
    		Header,
			Content,
			Footer
    	},
        data() {
            return {
                // checkLogin: false
            }
        },
        mounted() {
            EventBus.$on('CLogin', checkLogin => {
                console.log('checkLogin1')
            })
        }
    }
</script>
