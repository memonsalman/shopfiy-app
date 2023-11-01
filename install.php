<?php

// Set variables for our request
$shop = $_GET['shop'];
$api_key = "7d0fb9bfe194dcdefab7799ade737353";
$scopes = "read_orders,write_products";
$redirect_uri = "https://webdevelopment33.com/solvpath/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();