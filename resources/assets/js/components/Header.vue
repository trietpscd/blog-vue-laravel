<template>
	<nav class="navbar navbar-primary" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">VueLaravel</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">{{ link1 }}</a></li>
					<li><a href="#">{{ link2 }}</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<router-link class="btn btn-xs btn-warning" v-bind:to="'/login'">Login</router-link>
					</li>
					<li>
						<router-link class="btn btn-xs btn-primary" v-bind:to="'/register'">Regiter</router-link>
					</li>
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</template>
<script>
	import { EventBus } from './event-bus.js'
    export default {
        data() {
        	return {
        		link1: 'Link1',
        		link2: 'Link2',
        	}
        },
        mounted() {
            EventBus.$on('dataShare', (event) => {
            	this.link1 = event
            })
        },
    }
</script>
