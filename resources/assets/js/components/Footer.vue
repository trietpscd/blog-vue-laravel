<template>
    <footer>
	  <p>Posted by: {{ name }}</p>
	  <p>Contact information: <a href="mailto:pscd.trietpm@example.com">
	  pscd.trietpm@example.com</a>.</p>
      <button type="button" class="btn btn-success" @click="shareData()">button</button>
	</footer>
</template>

<script>
    import { EventBus } from './event-bus.js'

    export default {
        mounted() {
            console.log('Component Footer.')
        },
        data() {
            return {
                name: 'Triet Pham'
            }
        },
        methods: {
            shareData: function () {
                this.name = 'Pham Minh Triet'
                EventBus.$emit('dataShare', this.name)
            }
        }
    }
</script>
