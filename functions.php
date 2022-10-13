function woo_product_price_2sats(){
	$all_meta_data = get_post_meta(get_the_ID());
	$product_p=$all_meta_data['_regular_price'][0];
	$price_oracle_url = "https://blockchain.info/tobtc?currency=eur&value=$product_p";
	$ch = curl_init($price_oracle_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = number_format(ltrim(curl_exec($ch), "0."));
	$product_p_formated=rtrim($product_p, ".0");
	curl_close($ch);
    print "<img class='sat-favicon' src='/wordpress/wp-content/uploads/2022/10/Satoshi-regular-elipse.svg' width=40px;/><span class='btc-price'>{$data} Sats&nbsp;</span>";
	print "<span class='fiat-price'>&nbsp;{$product_p_formated} €</span>";
}
function woo_cart_total_2sats() {
	$total = floatval(WC()->cart->total);
	$price_oracle_url = "https://blockchain.info/tobtc?currency=eur&value=$total";
	$ch = curl_init($price_oracle_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = number_format(ltrim(curl_exec($ch), "0."));
	curl_close($ch);
	print "<img class='sat-favicon' src='/wordpress/wp-content/uploads/2022/10/Satoshi-regular-elipse.svg' width=40px;/><span class='btc-price'>{$data} Sats&nbsp;</span>";
	print "<span class='fiat-price'>&nbsp;| {$total} €</span>";
}
function woo_cart_subtotal_2sats() {
	$total = floatval(WC()->cart->subtotal);
	$price_oracle_url = "https://blockchain.info/tobtc?currency=eur&value=$total";
	$ch = curl_init($price_oracle_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = number_format(ltrim(curl_exec($ch), "0."));
	curl_close($ch);
	print "<span class='price_subtotal'>{$data}</span>";	
}
function woo_cart_item_price_2sats($price){
	$total = floatval(preg_replace("/[^0-9\.]/","",$price));
	$price_oracle_url = "https://blockchain.info/tobtc?currency=eur&value=$total";
	$ch = curl_init($price_oracle_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = number_format(ltrim(curl_exec($ch), "0."));
	curl_close($ch);
	print "<span class='btc-price'>{$data} 1Sats</span>";
}
function woo_cart_item_subtotal_2sats($price){
	$total = floatval(preg_replace("/[^0-9\.]/","",$price));
	$price_oracle_url = "https://blockchain.info/tobtc?currency=eur&value=$total";
	$ch = curl_init($price_oracle_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = number_format(ltrim(curl_exec($ch), "0."));
	curl_close($ch);
	print "<span class='btc-price'>{$data} 2Sats</span>";
}
add_filter( 'woocommerce_get_price_html', 'woo_product_price_2sats');
add_filter( 'woocommerce_cart_total', 'woo_cart_total_2sats');
#add_action( 'woocommerce_cart_subtotal', 'woo_cart_subtotal_2sats');
#add_filter( 'woocommerce_cart_item_price', 'woo_cart_item_price_2sats');
add_filter( 'woocommerce_cart_item_subtotal', 'woo_cart_item_subtotal_2sats');