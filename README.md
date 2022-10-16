# Woocommerce price to sats
**Series of php snippets to transform the price of your woocommerce shop in bitcoin or satoshis.**

*Notice, these snippets only change the price to its equivalent in btc/sats, if you want to receive payments in your woocommerce shop you must install a payment processor like [Btcpayserver](https://github.com/btcpayserver/btcpayserver).*

The operation of this snippet is based on a series of filters that you must add at the end of the `functions.php` file of your theme.

These snippets make a call to the oracle to convert the price of our products, this oracle is https://blockchain.info/tobtc and you can find it in the code like this `https://blockchain.info/tobtc?currency=$woo_currency&value=$total`

Basically we pass the currency set in our shop (`$woo_currency`) and then the total price (`$total`), this way we receive the response with the price equivalence in sats and then we show in the front end adding filters, for example `add_filter( 'woocommerce_get_price_html', 'woo_product_price_2sats');` 

If you want to configure to display prices in btc rather than satoshis just change the value of the $data variable within each filter from `$data = number_format(ltrim(curl_exec($ch), "0."));` to `$data = curl_exec($ch);`

(Bonus) I have configured my snippet to show an svg image with the satoshi symbol before the price in this way:
`"<img class='sat-favicon' src='/wordpress/wp-content/uploads/2022/10/Satoshi-regular-ellipse.svg' width=40px;/><span class='btc-price'>{$data} Sats&nbsp;</span>";`

**Feel free to play around with this snippet and share your experience!**
**Encouragement to all who work and share to facilitate adoption!**
**From a pleb to the plebs!**