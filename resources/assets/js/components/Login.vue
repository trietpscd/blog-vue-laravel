<template>
	<div class="container">
		<div id="login" class="form-re-log">
		    <h2>Login Form</h2>

			<form action="/action_page.php">
			  <div class="imgcontainer">
			    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
			  </div>

			  <div class="Container">
			    <label for="uname"><b>Username</b></label>
			    <input type="text" placeholder="Enter Username" name="uname" required>

			    <label for="psw"><b>Password</b></label>
			    <input type="password" placeholder="Enter Password" name="psw" required>
			        
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
            console.log('Component mounted.')
        }
    }
</script>
