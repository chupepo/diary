<html>
	<head>
		<title>Laravel</title>
		<meta charset="UTF-8"/>	
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<style>
			/*Este estilo es para dipositivos con menos resolucion de la pantalla*/
			@media only screen and (max-width: 767px) {
				body{
					background-image: url("/img/diary1.jpg");
					background-repeat:no-repeat;
					background-attachment: fixed;
					background-position: center center;
					background-size: cover;
					background-color: #464646;
				}
			}
			body {
				background-image: url("/img/diary1.jpg");
				background-repeat:no-repeat;
			  	background-attachment: fixed;
			  	background-position: center center;
			  	background-size: cover;
			  	background-color: #464646;
			}
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				_height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Verdana';
				
				line-height: 1;
				color: black;
			}
			.content {
				_text-align: center;
				display: inline-block;
				_background-color: blue;
			}
			.container2{
				width: 900px;
				height:500px;
				position: absolute;
				top: 50%;
				left: 50%;
				margin-left: -450px;
				margin-top: -250px;
			    text-align: center;
				font-size: 30;
				_background-color: red;
			}
			.getStart{
				margin: 15px 15px 15px 15px;
				_background-color: blue;
				_color: #333;
				_background-color: red;
			}
			.btn-start{
				font-size: 50px;
			}
			.publi{
				font-size: 20px;
			}
			.panel{
				_color:#B0BEC5;
				background-color: rgba(84, 83, 83, 0.46);

				padding-top:15px;
				padding-left:15px;
				padding-right:15px;
				padding-bottom:15px;
			}
		</style>
	</head>
	<body>
		<div class="container2">
			<div class="getStart">
				<div>
					<p><a class="btn btn-default btn-start" style="background-color: rgba(255, 255, 255, 0.43);" href="/auth/login" role="button">Login</a></p>
					<br />
					<div class="panel" style="">
						<p>Please select here to login in the page</p>
						<br />
						<div class="publi">
							<p>
								Try our digital diary, you would can write here all that you have always wanted, it is safe, agile and easy.
								Login and enjoy it.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
