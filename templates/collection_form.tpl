{extends file="layout.tpl"}

{block name="content"}
<div>
	<h1>Add Collection</h1>
	<form method="post">
        <label for="name">name</label>
        <input type="text" name="name">
		<input type="submit" value="add">
	</form>
</div>
{/block}
