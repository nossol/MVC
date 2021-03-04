{extends file="layout.tpl"}

{block name=body}
    {foreach $allProducts as $product}
        <li>
            <a href="/?page=productdetails&pid={$product->getId()}">{$product->getName()}</a>
        </li>
    {/foreach}
    <br>
    has product? {$hasProduct}
{/block}

