{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

Crontab: 
<pre>wget {$url|escape:'htmlall':'UTF-8'}</pre>
PHP:
<pre>
$url = '{$url|escape:'htmlall':'UTF-8'}';
$ch = curl_init({$url|escape:'htmlall':'UTF-8'});
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
</pre>