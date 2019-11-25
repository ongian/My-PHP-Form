<?php 
	require 'form-function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sample PHP Forms</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
<body>
	<div class="container">
		<div class="form-container">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<input class="form-control" type="text" name="name" placeholder="Name*" value="<?php echo isset($_POST['name'])? htmlspecialchars($_POST['name']) : ''; ?>">
					<?php echo isset($_POST['name']) && empty($_POST['name']) ? "<span class='alert-danger'>This field is required</span>" : ''; ?>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" name="email" placeholder="Email*" value="<?php echo isset($_POST['email'])? htmlspecialchars($_POST['email']) : ''; ?>">
					<?php 
						if(isset($_POST['email'])) {
							if(empty($_POST['email'])){
								echo "<span class='alert-danger'>This field is required</span>";
							} else {
								if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
									echo '<span class="alert-danger">Please Enter a valid email</span>';
								}
							}
						}						
					?>
				</div>
				<!--/(\d{11}|\+\d{12})/i-->
				<div class="form-group">
					<input class="form-control" type="text" name="phone" placeholder="Phone*" value="<?php echo isset($_POST['phone'])? htmlspecialchars($_POST['phone']) : ''; ?>">
					<?php 
						if(isset($_POST['phone'])){
							if(!empty($_POST['phone'])){
								echo preg_match('/^[0][0-9]{10}+$/', $_POST['phone'], $matches) ? '' : '<span class="alert-danger">Please input a valid number</span>';
							} else {
								echo '<span class="alert-danger">This field is required</span>';
							}
						}
					?>
					<!--?php echo isset($_POST['phone']) && empty($_POST['phone']) ? "<span class='alert-danger'>This field is required</span>" : ''; ?-->
				</div>
				<div class="form-group">
					<textarea class="form-control" name="message" placeholder="Your Message" ><?php echo isset($_POST['message'])? htmlspecialchars($_POST['message']) : ''; ?></textarea>
					<?php echo isset($_POST['message']) && empty($_POST['message']) ? "<span class='alert-danger'>This field is required</span>" : ''; ?>
				</div>
				<div class="form-group">
					<input type="submit" value="Send" name="submit" class="btn btn-primary">
				</div>
			</form>
			<?php
				if($formSubmitMsg != ''){
					echo "<span class='<php echo $msgClass;?>'> $formSubmitMsg <span>";
				}
			?>
		</div>
	</div>
</body>
</html>