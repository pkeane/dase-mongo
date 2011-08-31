{extends file="layout.tpl"}

{block name="content"}
<h2>Collections</h2>
<ul>
    {foreach item=c from=$collections}
    <li><a href="collection/{$c['ascii_id']}">{$c['name']}</a></li>
    {/foreach}
    <a href="collection/form/new">add a collection</a>
</ul>
{/block}
