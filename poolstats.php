<?php
$debug=0;
//////////////get json data////////////////
////////////////pirl///////////////////////

$url="http://pirl.cryptopools.info/api/stats";
$contents = file_get_contents($url);
$pirlresults = json_decode($contents, true);
if ($debug != "0") {
        print_r($pirlresults);
 }

///////////////moac//////////////////////////
$url="http://moac.cryptopools.info/api/stats";
$contents = file_get_contents($url);
$moacresults = json_decode($contents, true);
if ($debug != "0") {
        print_r($moacresults);
}



/////////////akroma////////////////////////
$url="http://akroma.cryptopools.info/api/stats";
$contents = file_get_contents($url);
$akromaresults = json_decode($contents, true);
if ($debug != "0") {
        print_r($akromaresults);
}

///////////////atheios///////////////////////
$url="http://atheios.cryptopools.info/api/stats";
$contents = file_get_contents($url);
$atheiosresults = json_decode($contents, true);
if ($debug != "0") {
        print_r($atheiosresults);
}

$url="https://www.coincalculators.io/api.aspx?name=pirl&hashrate=40000000";
$contents = file_get_contents($url);
$pirlcmc = json_decode($contents, true);
if ($debug != "0") {
        print_r($pirlcmc);
}

$url="https://www.coincalculators.io/api.aspx?name=akroma&hashrate=40000000";
$contents = file_get_contents($url);
$akromacmc = json_decode($contents, true);
if ($debug != "0") {
        print_r($akromacmc);
}

$url="https://www.coincalculators.io/api.aspx?name=moac&hashrate=40000000";
$contents = file_get_contents($url);
$moaccmc = json_decode($contents, true);
if ($debug != "0") {
        print_r($moaccmc);
}

$url="https://www.coincalculators.io/api.aspx?name=atheios&hashrate=40000000";
$contents = file_get_contents($url);
$atheioscmc = json_decode($contents, true);
if ($debug != "0") {
        print_r($atheioscmc);
}





//print_r($calccmc);

$akroma_price_usd=number_format($akromacmc['price_usd'], 6);
$akroma_price_btc=number_format($akromacmc['price_btc'], 8);
$akroma_price_change=number_format($akromacmc['percentChange_24h'], 3);

$moac_price_usd=number_format($moaccmc['price_usd'], 6);
$moac_price_btc=number_format($moaccmc['price_btc'], 8);
$moac_price_change=number_format($moaccmc['percentChange_24h'], 3);

$pirl_price_usd=number_format($pirlcmc['price_usd'], 6);
$pirl_price_btc=number_format($pirlcmc['price_btc'], 8);
$pirl_price_change=number_format($pirlcmc['percentChange_24h'], 3);


$atheios_price_usd=number_format($atheioscmc['price_usd'], 6);
$atheios_price_btc=number_format($atheioscmc['price_btc'], 8);
$atheios_price_change=number_format($atheioscmc['percentChange_24h'], 3);


function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

//need an effective way to get btc values of each coin one time, without lots of work
// :(


//get global value for btc/usd to use
$btc_usd=getbtcusd();
global $btc_usd;
function getbtcusd()
{
$url="https://api.coinmarketcap.com/v2/ticker/1/?convert=BTC";
$contents = file_get_contents($url);
$btcresults = json_decode($contents, true);
//print_r($btcresults);
//echo $btcresults['data']['quotes']['USD']['price'];
return $btcresults['data']['quotes']['USD']['price'];
}

//  function get_price() {

    //get btc price for some weak ass apis to do math with
//    $.getJSON("https://api.coinmarketcap.com/v2/ticker/1/?convert=BTC", function(data) {
//      var items = [];
//      $.each(data, function(key, val) {
        //get usd btc price, assign to btcprice
//        btcprice = data.data.quotes.USD.price;
        //alert("btcprice is "+ btcprice);
//        return btcprice;
//      });
//    });


function get_btc_usd($json_url, $json_element)
{//json url, obvious. json element is the element with the btc value of the coin. 
//the btc value os usd is defined before we are called and made global
//echo $btc_usd;

}


//echo $btc_usd;




$pirlcontent ="
<tr>
  <td class=\"text-center\"><img height=\"40px\" src=\"https://cryptopools.info/images/pirl_logo.png\" /></td>
  <td>Pirl</td>
  <td>".human_filesize($pirlresults['hashrate'])."</td>
  <td>".$pirlresults['minersTotal']."</td>
  <td>".$pirlresults['immatureTotal']."</td>
  <td>".$pirl_price_usd."</td>
  <td>".$pirl_price_btc."</td>
  <td>".$pirl_price_change."</td>
  <td class=\"text-center\"><a href=\"https://pirl.cryptopools.info\" class=\"btn btn-success\">Mine Now</a></td>
</tr>
";

$akromacontent ="
<tr>
  <td class=\"text-center\"><img height=\"40px\" src=\"https://cryptopools.info/images/akroma_logo.png\" /></td>
  <td>Akroma</td>
  <td>".human_filesize($akromaresults['hashrate'])."</td>
  <td>".$akromaresults['minersTotal']."</td>
  <td>".$akromaresults['immatureTotal']."</td>
  <td>".$akroma_price_usd."</td>
  <td>".$akroma_price_btc."</td>
  <td>".$akroma_price_change."</td>
  <td class=\"text-center\"><a href=\"https://akroma.cryptopools.info\" class=\"btn btn-success\">Mine Now</a></td>
</tr>
";


$atheioscontent ="
<tr>
  <td class=\"text-center\"><img height=\"40px\" src=\"https://cryptopools.info/images/atheios_logo.png\" /></td>
  <td>Atheios</td>
  <td>".human_filesize($atheiosresults['hashrate'])."</td>
  <td>".$atheiosresults['minersTotal']."</td>
  <td>".$atheiosresults['immatureTotal']."</td>
  <td>".$atheios_price_usd."</td>
  <td>".$atheios_price_btc."</td>
  <td>".$atheios_price_change."</td>
  <td class=\"text-center\"><a href=\"https://Atheios.cryptopools.info\" class=\"btn btn-success\">Mine Now</a></td>
</tr>
";

$moaccontent ="
<tr>
  <td class=\"text-center\"><img height=\"40px\" src=\"https://cryptopools.info/images/MOAC_logo.png\" /></td>
  <td>MOAC</td>
  <td>".human_filesize($moacresults['hashrate'])."</td>
  <td>".$moacresults['minersTotal']."</td>
  <td>".$moacresults['immatureTotal']."</td>
  <td>".$moac_price_usd."</td>
  <td>".$moac_price_btc."</td>
  <td>".$moac_price_change."</td>
  <td class=\"text-center\"><a href=\"https://MOAC.cryptopools.info\" class=\"btn btn-success\">Mine Now</a></td>
</tr>
";


$content = "$pirlcontent";
$content .= "$akromacontent";
$content .= "$atheioscontent";
$content .= "$moaccontent";

if ($debug != "0") {
echo $content;
}

$filename="/home/mohannad/cryptopools.info/stats.php";
$file = fopen("$filename","w");
$charnum = fwrite($file, "$content");
fclose($file);

?>


