<template>
	<div class="container">
		<div id="register" class="form-re-log">
		    <h2>Register Form</h2>

			<form action="/action_page.php">
			  <div class="imgcontainer">
			    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
			  </div>

			  <div class="Container">
			    <label for="uname"><b>Username</b></label>
			    <input type="text" placeholder="Enter Username" name="uname" required>

			    <label for="email"><b>Email</b></label>
			    <input type="text" placeholder="Enter Username" name="email" required>

			    <label for="psw"><b>Password</b></label>
			    <input type="password" placeholder="Enter Password" name="psw" required>

			    <label for="psw"><b>Confirm Password</b></label>
			    <input type="password" placeholder="Enter Confirm Password" name="cnf_psw" required>
			        
			    <button type="submit">Regiter</button>
			  </div>

			  <div class="Container" style="background-color:#f1f1f1">
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
        }
    }
</script>
