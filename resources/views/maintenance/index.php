<?php $resources = "resources/views/maintenance"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Coming Soon</title>
	<meta name="robot" content="NOINDEX, NOFOLLOW">
	<script src="<?= $resources ?>/js/jquery-2.0.3.min.js"></script>
	<style>
		html, body {
			background: url(<?= $resources ?>/img/bg_cs.jpg) no-repeat bottom;
			-webkit-background-size: cover;
			background-size: cover;
			width: 100%;
			height: 100%;
			position: relative;
			margin: 0;
			padding: 0;
			font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
		}
		.countdown-period {
			font-size: 20px;
			margin-left: 10px;
			margin-right: 50px;
			text-shadow: 0px 0px 15px #3498db;
		}
		.countdown-section:last-child .countdown-period {
			margin-right: 0;
		}
		.countdown-amount {
			font-size: 40px;
			font-weight: bold;
			text-shadow: 0px 0px 15px #3498db;
		}
		#defaultCountdown {
			padding-top: 40vh;
			color: #fff;
		}
	</style>
</head>
<body>
	
	<center>
		<div id="defaultCountdown"></div>
	</center>
	
	<script src="<?= $resources ?>/plugin/countdown/jquery.plugin.js"></script>
	<script src="<?= $resources ?>/plugin/countdown/jquery.countdown.js"></script>
	<script>
		$(function () {
			var austDay = new Date();
			austDay = new Date(austDay.getFullYear(), 1 + 11, 7);
			$('#defaultCountdown').countdown({until: austDay});
			$('#year').text(austDay.getFullYear());
		});
	</script>


</body>
</html>