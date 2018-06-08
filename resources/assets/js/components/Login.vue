<template>
	<div class="container">
		<div id="login" class="form-re-log">
		    <h2>Login Form</h2>
			<div class="alert alert-danger" v-if="error && !success">
	            <p>{{ errors.msg }}</p>
	        </div>
	        <div class="alert alert-success" v-if="success">
	            <p>Login completed.</p>
	        </div>
			<form autocomplete="off" @submit.prevent="login" method="post" v-if="!success">
			  <div class="imgcontainer">
			    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
			  </div>

			  <div class="Container">
			    <label for="email"><b>Username</b></label>
			    <input type="text" placeholder="Enter Email" name="email" v-model="email" required>

			    <label for="password"><b>Password</b></label>
			    <input type="password" placeholder="Enter Password" name="password" v-model="password" required>
			        
			    <button type="submit">Login</button>
			    <label>
			      <input type="checkbox" checked="checked" name="remember"> Remember me
			    </label>
			  </div>

			  <div class="Container" style="background-color:#f1f1f1">
			    <button type="button" class="cancelbtn">Cancel</button>
			    <span class="psw">Forgot <a href="#">password?</a></span>
			  </div>
			</form>
		</div>
	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('login')
        },
        data() {
        	return {
        		email: '',
        		password: '',
        		error: false,
        		success: false,
        		errors: {

        		},

        	}
        },
        methods: {
        	login() {
        		this.$auth.login({
        			params: {
        				email: this.email,
        				password: this.password
        			},
        			success: function(resp) {
        				console.log(resp);
        			},
        			error: function (resp) {
        				console.log(resp);
        			},
        			rememberMe: true,
		            redirect: '/dashboard',
		            fetchUser: true,
        		})
        	}
        }
    }
</script>
