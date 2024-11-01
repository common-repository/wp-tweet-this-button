<?php
/*
Plugin Name: WP Tweet This Button
Plugin URI: http://fusionswift.com/wp-tweet-this-button/
Description: This plugin will add Twitter's Tweet This button to a post, or the sidebar. This plugin will allow the user to select from numerous button layouts, and will provide the opportunity to customize the tweet message.
Version: 0.1
Author: Tech163
Author URI: http://fusionwift.com/
*/

define('WPTWEETBUTTONVER', '0.1');

function wp_tweet_this_button_admin() {
	if(!empty($_POST['buttonstyle'])) {
		$options = array(
			'buttonstyle' => $_POST['buttonstyle'],
			'displayarea' => $_POST['displayarea'],
			'via' => $_POST['via'],
			'related' => $_POST['related']
		);
		die(print_r($options));
	}
	?>
	<div class="wrap"><h2>Tweet This Button</h2>
	<style type="text/css">.wptweetercontentleft{padding:10px}.contentright{float:right}.wptweetercontentleft{width:28%;float:left;padding-right:10px;margin-top:10px;position:relative}.wptweetercontentleft h4{font-size:14px;color:#d54e21;letter-spacing:-1px;margin:0 0 0;padding-bottom:5px}.wptweetercontentleft p{margin-top:0}.wptweetercontentleft ul{-webkit-border-radius:5px;-moz-border-radius:5px}.wptweetercontentleft li{color:#536e90;margin:0 5px;padding:1px 0;list-style-type:circle;list-style-position:inside}.wptweetercontentright{width:63%;float:left;margin-left:3%;border-left:1px solid #e6e6e6;margin-bottom:-10px;padding-bottom:10px;padding-left:10px;padding-top:10px;min-height:35px}.wptweetercontentright li{list-style-type:none}.fsclear{clear:both}
	.tweeticons div {
		margin: 10px auto 15px auto;
	}
	.tweetv {
		background: url(http://i34.tinypic.com/2vsoxut.png);
		width:55px;
		height:62px;
	}
	.tweeth {
		background: url(http://i34.tinypic.com/2vsoxut.png) 0px 20px;
		width: 107px;
		height: 20px;
	}
	.tweetnone {
		background: url(http://i34.tinypic.com/2vsoxut.png) 0px 20px;
		width:55px;
		height:20px;
	}
	</style>
	<form action="" method="post">
	<?php wp_nonce_field('update-options'); ?>
	<div class="metabox-holder">
		<div class="postbox">
      		<h3>Button Style</h3>
				<div class="wptweetercontentleft">
					<p>The tweet button is available in 3 different styles. Here, you can choose the number of times it has been tweeted, and whether or not it has been tweeted at all.</p>
				</div>
				<div class="wptweetercontentright">
					<table border="1">
					<tr align="center"><td width="150px"><input type="radio" name="buttonstyle" value="verticle" checked> Verticle Count</td><td width="150px"><input type="radio" name="buttonstyle" value="horizontal"> Horizontal Count</td><td width="150px"><input type="radio" name="buttonstyle" value="none"> No Count</td></tr>
					<tr class="tweeticons"><td><div class="tweetv"></span></td><td><div class="tweeth"></div></td><td><div class="tweetnone"></div></td></tr>
					</table>
				</div>
				<div class="fsclear"></div>
		</div>
	</div>
	<div class="metabox-holder">
		<div class="postbox">
      		<h3>Where to Display</h3>
				<div class="wptweetercontentleft">
					<p>Here, you can choose where the Tweet Button will be located. See the Documentations for screenshots of the different placements.</p>
				</div>
				<div class="wptweetercontentright">
					<p><input type="radio" name="displayarea" value="floatright" checked> Float Right</p>
					<p><input type="radio" name="displayarea" value="floatleft"> Float Left</p>
					<p><input type="radio" name="displayarea" value="beforepost"> Before Post</p>
					<p><input type="radio" name="displayarea" value="afterpost" style="margin-bottom:10px"> After Post</p>
				</div>
				<div class="fsclear"></div>
		</div>
	</div>
	<div class="metabox-holder">
		<div class="postbox">
      		<h3>Twitter Accounts</h3>
				<div class="wptweetercontentleft">
					<p>These two options are self explanatory. The Reulated Accounts option allow several accounts, separated by commas.</p>
				</div>
				<div class="wptweetercontentright">
					<p><strong>Via Accounts</strong> - This account will be mentioned in the tweet, as in "via @tech163" appended at the end of the tweet.</p>
					<p><input type="text" name="via" /></p>
					<p><strong>Related Accounts</strong> - The user will be prompted to follow these accounts after they have tweeted. Separate the different accounts using a comma.</p>
					<p><input type="text" name="related" /></p>
				</div>
				<div class="fsclear"></div>
		</div>
	</div>
	</form>
	</div>
<?php }

function wp_tweet_this_button_menu() {
	add_options_page('Tweet This Button', 'Tweet This Button', 8, basename(__FILE__), 'wp_tweet_this_button_admin');
}


add_action('admin_menu', 'wp_tweet_this_button_menu');

?>