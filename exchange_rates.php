<?php
echo "
		<span class='WalletsPreview'>Exchange Rate:</span>
		<table cellpadding=5 cellspacing=0 border=0 class='ListOfCurrencyOnPreview'>
		<tr><td class='WalletName'>- USD</td><td>- {$USD_RUB}р.</td></tr>
		<tr><td class='WalletName'>- EUR</td><td>- {$EUR_RUB}р.</td></tr>
		<tr><td class='WalletName'>- BTC</td><td>- ".add_spaces($BTC_RUB)."р.</td></tr>
		<tr><td class='WalletName'>- ETH</td><td>- ".add_spaces($ETH_RUB)."р.</td></tr>
		<tr><td class='WalletName'>- BTC</td><td>- ".add_spaces($BTC_USD)."$</td></tr>
		<tr><td class='WalletName'>- ETH</td><td>- ".add_spaces($ETH_USD)."$</td></tr>
		</table>";