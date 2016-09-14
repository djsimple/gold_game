<?php
/* Mini-game that helps a ninja make some money! When you start the game, your ninja should have 0 gold. The ninja can go to different places (farm, cave, house, casino) and earn different amounts of gold. In the case of a casino, your ninja can earn or LOSE up to 50 golds. Your job is to create a web app that allows this ninja to earn gold and to display past activities of this ninja.

*/?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Make Money!!!</title>
    <!-- <link rel="stylesheet" href="/assets/css/skeleton.css"> -->
 	<link rel="stylesheet" href="http://sharolchand.com/projects/ninja-gold-game/assets/css/skeleton.css">
	<style type="text/css" media="screen">
		#main{
			border: 2px solid silver;
			border-radius: .3em;
			padding: 2%;
		}
		label{
			display: inline-block;
			width: auto;
		}
		#score{
			font-size: 1.3em;
			margin-left: .5em;
		}
		.container{
			border: .3rem solid black;
		//	background: grey;
			padding-top: 5%;
		}
		#choices{
			text-align: center;
		}
		.plus{
			color: green;
		}
		.minus{
			color: red;
		}
		#activities_list{
			padding: 2%;
			overflow-y: scroll;
			height: 300px;
		}
		#activities_list p{
			margin: 0em;
		}
		.refresh{
			text-align: right;
		}
	</style>
 </head>
 <body>
 	<!-- Begin main -->
 	<div id="main" class="container">
 		<div class="six columns">
 			<label for="score">Your Gold: <input type="text" disabled name="score" id="score" value="<?php echo $this->session->userdata('gold'); ?>"></label>
 		</div>
 		<div class="six columns refresh">
 			<form action="/process_money" method="post">
 					<input type="hidden" name="building" value="reset"/>
 					<input type="submit" name="refresh" value="Refresh" class="button-primary" />

 					<!-- <input type="submit" value="Find Gold!" /> -->
 				</form>
 		</div>

 		<!-- Begin Choices -->
 		<div id="choices" class="row">
 			<!-- Farm -->
 			<div class="container three columns">
 				<h4>Farm</h4>
 				<h6>(earns 10-20 golds)</h6>
 				<form action="/process_money" method="post">
 					<input type="hidden" name="building" value="farm"/>
 					<input type="submit" value="Find Gold!" />
 				</form>
 			</div>

 			<!-- Cave -->
 			<div class="container three columns">
 				<h4>Cave</h4>
 				<h6>(earns 5-10 golds)</h6>
 				<form action="/process_money" method="post">
 					<input type="hidden" name="building" value="cave"/>
 					<input type="submit" value="Find Gold!" />
 				</form>
 			</div>

 			<!-- House -->
 			<div class="container three columns">
 				<h4>House</h4>
 				<h6>(earns 2-5 golds)</h6>
 				<form action="/process_money" method="post">
 					<input type="hidden" name="building" value="house"/>
 					<input type="submit" value="Find Gold!" />
 				</form>
 			</div>

 			<!-- Casino -->
 			<div class="container three columns">
 				<h4>Casino!</h4>
 				<h6>(earns/takes 0-50 golds)</h6>
 				<form action="/process_money" method="post">
 					<input type="hidden" name="building" value="casino"/>
 					<input type="submit" value="Find Gold!" />
 				</form>
 			</div>
 		</div><br> <!-- End Choices -->

 		<!-- Begin Activities -->
 		<label>Activities:</label>
 		<div id="activities_list" class="container row u-full-width">
 			<?php

 			$activities = $this->session->userdata('activities');
 			foreach (array_reverse($activities) as $activity) {
 				echo $activity;
 			}

 			?>
 		</div>
 	</div> <!-- end main -->
 </body>
 </html>
