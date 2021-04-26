<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="/css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="email" value="<?php ?>"/>
			</div>
			<div>
				<input type="text" placeholder="Password" required="" name="password" value="<?php ?>"/>
			</div>
			<div>
				<input type="submit" value="Log in" name="submit"/>
			</div>
<!--            --><?php if (isset($error)){
                    echo $error;
            }?>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>