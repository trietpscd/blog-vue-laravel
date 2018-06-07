<template>
    <div class="panel panel-default">
        <div class="panel-heading">
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
						<router-link class="navbar-brand" v-bind:to="'/'">VueLaravel</router-link>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Link</a></li>
							<li><a href="#">Link</a></li>
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
        </div>
        <div class="panel-body">
            <router-view></router-view>
        </div>
        <div class="panel-footer">
        	<footer>
			  <p>Posted by: Triet Pham</p>
			  <p>Contact information: <a href="mailto:pscd.trietpm@example.com">
			  pscd.trietpm@example.com</a>.</p>
			</footer>
        </div>
    </div>
</template>