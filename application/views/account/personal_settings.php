<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="description" content="Worthy">
<meta name="author" content="hobby">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Worthy——个人中心</title>
<base href="<?php echo base_url(); ?>" />

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico">

<!-- Web Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300'
	rel='stylesheet' type='text/css'>

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Plugins -->
<link href="css/animations.css" rel="stylesheet">

<!-- Worthy core CSS file -->
<link href="css/style.css" rel="stylesheet">

<!-- Custom css -->
<link href="css/custom.css" rel="stylesheet">

<!-- mystyle css -->
<link href="css/mystyle.css" rel="stylesheet">

</head>

<body class="no-trans">
	<!-- section start -->
	<!-- ================ -->
	<div class="section translucent-bg bg-image-1 blue">
		<div class="container object-non-visible"
			data-animation-effect="fadeIn">
			<h1 id="login" class="text-center title">Register</h1>
			<div class="space"></div>
			<div class="row" style="font-size: 20px">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<form action="" method="post" role="form">
						<div class="form-group">
							<label>用户名:</label> <span><?php echo $userMsg->username; ?></span>
						</div>
						<div class="form-group">
							<label>用户类别:</label><span><?php echo $userMsg->identity; ?></span>
						</div>
						<div class="form-group">
							<label for="password">密码</label> <input name="password"
								id="userpwd" type="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">邮箱</label> <input name="email" id="email"
								type="text" class="form-control"
								placeholder="<?php echo $userMsg->email; ?>">
						</div>
						<div class="form-group">
							<label for="tel">手机号码</label> <input name="telnum" id="tel"
								type="text" class="form-control"
								placeholder="<?php echo $userMsg->tel; ?>">
						</div>
						<div class="form-group">
							<label for="age">年龄</label> <input name="age" id="age"
								type="text" class="form-control"
								placeholder="<?php echo $userMsg->age; ?>">
						</div>
						<div class="form-group">
							<label for="height">身高</label> <input name="height" id="height"
								type="text" class="form-control"
								placeholder="<?php echo $userMsg->height; ?>">
						</div>
						<div class="form-group">
							<label for="weight">体重</label> <input name="weight" id="weight"
								type="text" class="form-control"
								placeholder="<?php echo $userMsg->weight; ?>">
						</div>
						<div align="center">
							<input type="submit" class="btn btn-success" value="保存设置">
						</div>
					</form>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</div>
	<!-- section end -->

	<!-- section start -->
	<!-- ================ -->
	<div class="default-bg space blue">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1 class="text-center">Let's Train Together!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- section end -->

	<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
	<!-- Jquery and Bootstap core js files -->
	<script type="text/javascript" src="plugins/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Modernizr javascript -->
	<script type="text/javascript" src="plugins/modernizr.js"></script>

	<!-- Isotope javascript -->
	<script type="text/javascript"
		src="plugins/isotope/isotope.pkgd.min.js"></script>

	<!-- Backstretch javascript -->
	<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

	<!-- Appear javascript -->
	<script type="text/javascript" src="plugins/jquery.appear.js"></script>

	<!-- Initialization of Plugins -->
	<script type="text/javascript" src="js/template.js"></script>

	<!-- Custom Scripts -->
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>