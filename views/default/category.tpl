{*Category page*}
<h1> Products of {$rsCategoryName}</h1>

{foreach $rsProducts as $item name=products}
    <div style="float: left; padding: 0px 30px 40px 0px;">
        <a href="/product/{$item['id']}/">
            <img src="/www/images/products/{$item['image']}.jpg"witdh="100"/>
        
        </a><br />
        <a href="/product/{$item['id']}/">{$item['name']}</a>
     {if $smarty.foreach.products.iteration mod 3 ==0}
       <div style="clear: both;"> </div>
    {/if}
    </div>
{/foreach}

{foreach $rsChildCats as $item name=childCats}
    
    <h2> <a href="/category/{$item['id']}/">{$item['name']}</a></h2>
    
{/foreach}
