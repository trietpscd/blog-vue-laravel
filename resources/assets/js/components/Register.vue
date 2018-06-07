<template>
	<div class="container">
		<div id="register" class="form-re-log">
		    <h2>Register Form</h2>
		    <div class="alert alert-danger" v-if="error && !success">
	            <p>There was an error, unable to complete registration.</p>
	        </div>
	        <div class="alert alert-success" v-if="success">
	            <p>Registration completed. You can now <router-link :to="{name:'login'}">sign in.</router-link></p>
	        </div>
			<form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
			  <div class="imgcontainer">
			    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
			  </div>

			  <div class="Container">
			    <label for="name"><b>Username</b></label>
			    <input type="text" placeholder="Enter Username" name="name" required v-model="name"> 
			    <span class="help-block" v-if="error && errors.name">{{ errors.name[0] }}</span>

			    <label for="email"><b>Email</b></label>
			    <input type="text" placeholder="Enter Username" name="email" required v-model="email">
			    <span class="help-block" v-if="error && errors.email">{{ errors.email[0] }}</span>

			    <label for="password"><b>Password</b></label>
			    <input type="password" placeholder="Enter Password" name="password" required v-model="password">
			    <span class="help-block" v-if="error && errors.password">{{ errors.password[0] }}</span>

			    <!-- <label for="psw"><b>Confirm Password</b></label>
			    <input type="password" placeholder="Enter Confirm Password" name="cnf_psw" required> -->
			  </div>
			  <div class="Container" style="background-color:#f1f1f1">
			    <button type="submit">Regiter</button>
			    <button type="button" class="cancelbtn">Cancel</button>
			  </div>
			</form>
		</div>
	</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
        	return ({
        		name: '',
                email: '',
                password: '',
                error: false,
                errors: {},
                success: false
        	})
        },
        methods: {
        	register() {
                this.$auth.register({
                    params: {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }, 
                    success: function (resp) {
                    	if(resp.data.status === 'error') {
                    		this.error = true;
                    		this.errors = resp.data.error;
                    		console.log(this.errors.email[0]);
                    	} else {
                    		this.success = true
                    	}
                        
                    },
                    error: function (resp) {
                    	console.log('error');
                        // this.error = true;
                        // this.errors = resp.response.data.errors;
                    },
                    redirect: null
                });     
        	}
        },
    }
</script>
