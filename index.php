<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comics</title>

	<style>
		* {font-size: 50px; font-family: Tahoma, Arial;}
        small {color: orange;}
        small, small a {font-size: 35px; line-height: 1.1; display: block; margin-bottom: 10px;}
		body {margin: 0; padding: 0; background-image: url('./assets/img/bg01.png'); color: #fff;}
        a {color: #fff;}
        a:hover {color: orange;}
		.buttons {position: absolute; left: 0; top: 0; margin: 0;}
		.buttons li {float: left; display: block; padding-right: 20px;}
		.buttons li a {width: 200px; height: 75px; background-color: white; color: gray; opacity: .2; padding: 30px; text-decoration: none; display: block; border: 1px solid gray;}
		.buttons li a:hover {opacity: .9;}
		.big_img {display: block;}
		.paginator {display: block; overflow: hidden;}
		.paginator>a, .paginator>span {margin: 0 15px; float: left;}
        .paginator>a {text-decoration: none;}
        .paginator>span {color: orange;}
		.paginator td {vertical-align: top;}
		.home_btn {display: block; height: 150px; position: fixed; width: 100%; top: 0; background-color: #000; text-align: center; opacity: 0; color: #fff; text-decoration: none; padding-top: 60px;}
		.home_btn:hover {opacity: .7;}
        .items {width: 100%; display: block; overflow: hidden; padding: 0;}
        .items li {float: left; width: 48%; list-style-type: none; height: 400px; overflow: hidden; margin-bottom: 10px;}
        .items li td {padding: 0 15px; vertical-align: top;}
        .items li img {max-width: 200px;}
	</style>
</head>
<body>
	<?=include './app/content.php'?>
</body>
</html>