<?php

/**
 * Elgg Donation plugin
 * @license: GPL v 2.
 * @author Tiger
 * @copyright TechIsUs
 * @link www.techisus.dk
 */

// Get plugin settings
$profile_show = elgg_get_plugin_setting("profile_show","donation");
if(!$profile_show) $profile_show = "small";
$num_display = elgg_get_plugin_setting("num_display","donation");
if(!$num_display) $num_display = "8";
$paypal_code = elgg_get_plugin_setting("paypal_code","donation");
$bank_account = elgg_get_plugin_setting("bank_account","donation");

// Current time
$time = time();

$NameValuePairs[] = array('name' => 'donation', 'operand' => '>', 'value' => $time);
$order = array('name' => 'donation', 'direction' => 'DESC');
$query =  array(
		'type' => 'user',
		'limit' => $num_display,
    		'metadata_name_value_pairs' => $NameValuePairs, 
		'order_by_metadata' => $order);

$newest_donators = elgg_get_entities_from_metadata($query);
?>

<div class="donationWrapper">
<?php
echo "<center>" . elgg_echo('donation:desc', array(elgg_get_config('sitename'))) . "<br>";
if($paypal_code){
	echo elgg_echo('donation:paypal');
	echo $paypal_code;
}
if($bank_account){
	echo elgg_echo('donation:banktransfer');
	echo "<br>" . elgg_echo('donation:bank_account:text', array($bank_account)) . "<br>";
}

echo "<hr>";
echo elgg_echo('donation:latest');
echo "<br></center>";

if (!$newest_donators) {
	echo elgg_echo('donation:none');
} else {	
	echo "<ul class='elgg-gallery'>";
	foreach($newest_donators as $donator) {
		echo "<li class='elgg-item mrs'>";
		echo elgg_view_entity_icon($donator, $profile_show, array('hover' => false));
		echo "</li>";
	}
}
?>
<div class="clearfloat"></div>
<a href="<?php echo $CONFIG->site->url; ?>donation"><?php echo elgg_echo('donation:show:everyone'); ?></a>
</div>
