{extends file="layout.tpl"}

{block name="content"}
<h2>Collection: {$c->name}</h2>
<h3>Attributes</h3>
<ul>
    {foreach item=att from=$c->attributes}
    <li><a href="attribute/{$att->ascii-id}">{$att->name}</a></li>
    {/foreach}
    <a href="attribute/{$c->ascii_id}/form/new">add an attribute</a>
</ul>
{/block}
