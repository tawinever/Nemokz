{*
* 2015 Dejavu Arts S.L.
*
* NOTICE OF LICENSE
*
* This source file is subject to the copyright.
*
* DISCLAIMER
*
* Do not edit or add to this file.
*
* @author    Dejavu Arts S.L. <desarrollo@dejavu.es>
* @site www.dejavu.es
* @copyright Copyright (c) 2015 Dejavu Arts S.L.
*   @license   Copyright. All Rights Reserved
*}
<table border="1" cellpadding="2" style="border-color: #2040f50">
    <tr style="font-size: 1.1em; background-color: #264f5d; color:white">
        <th style="width: 300px">{l s='Name' mod='djvean13gen'}</th>
        <th style="width: 100px">{l s='Reference' mod='djvean13gen'}</th>
        <th style="width: 100px">{l s='EAN13' mod='djvean13gen'}</th>
        <th style="width: 100px">{l s='Price' mod='djvean13gen'}</th>
        <th style="width: 100px">{l s='Special price' mod='djvean13gen'}</th>
        <th style="width: 60px">{l s='Quantity' mod='djvean13gen'}</th>
    </tr>
    
    {foreach ($product_quantities as $p)}        
        <tr {if (($p@index % 2) == 1)}style="background-color: lightgray; color:white{/if}}>
            <td style="text-align: left">{$p.data.name|escape:'htmlall':'UTF-8'}"}</td>
            <td style="text-align: left">{$p.data.reference|escape:'htmlall':'UTF-8'}</td>
            <td style="text-align: center">{$p.data.ean13|escape:'htmlall':'UTF-8'}</td>
            <td style="text-align: center">{displayPrice price=$p.data.price}</td>
            <td style="text-align: center">{displayPrice price=$p.data.special}</td>
            <td style="text-align: right">x{$p.quantity|intval}</td>
        </tr>
    {/foreach}
</table>
