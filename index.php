<?php

	/**
	 * Elgg Donation plugin
	 * @license: GPL v 2.
	 * @author Tiger
	 * @copyright TechIsUs
	 * @link www.techisus.dk
	 */

	// Load Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	// Set title
	$title = elgg_view_title(elgg_echo('donation:title:everyone'));
		
	// Get the list of all donators
	$body = elgg_view("donation/everyone");

	//set a view to the donation box
	$sidebar = elgg_view("donation/donation");

	// Display them in the page
        $page = elgg_view_layout("two_column_left_sidebar", '', $title . $body, $sidebar);
		
	// Display page
	page_draw(elgg_echo('donation:title:everyone'),$page);
		
?>
