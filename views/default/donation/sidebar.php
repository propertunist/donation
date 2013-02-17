<?php
/**
 * Donations sidebar
 */

$body = elgg_view('donation/donation');
$title = elgg_echo('donation:title', array(elgg_get_config('sitename')));
echo elgg_view_module('aside', $title, $body);

