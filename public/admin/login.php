<?php
require_once("../../includes/initialize.php");
?>


<?php include_layout_template('admin_header.php'); ?>

		<h2>Staff Login</h2>
		<?php //echo output_message($message); ?>

		<form action="" method="POST">
		  <table>
		    <tr>
		      <td>Username:</td>
		      <td>
		        <input type="text" name="username" maxlength="30" placeholder="Enter username" />
		      </td>
		    </tr>
		    <tr>
		      <td>Password:</td>
		      <td>
		        <input type="password" name="password" maxlength="30" placeholder="Enter password" />
		      </td>
		    </tr>
		    <tr>
		      <td colspan="2">
		        <input type="submit" name="submit" value="Login" />
		      </td>
		    </tr>
		  </table>
		</form>

<?php include_layout_template('admin_footer.php'); ?>

<?php
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        //check the user database

        $found_user = User::authenticate($username,$password);
        if($found_user){
            $session->login($found_user);
            redirect_to('index.php');
        }else{
            $message  = "Username or password incorrect";
        }
    }else{
        $username="";
        $password="";
    }
?>

