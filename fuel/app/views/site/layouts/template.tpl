<!DOCTYPE html>
<html>
<head>
	{include file='site/layouts/header.tpl'}
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{$title}</h1>
				<hr>
				{include file='elements/message.tpl'}
			</div>
			<div class="col-md-12">{$content}</div>
		</div>
		<hr/>
		<footer>
			{include file='site/layouts/footer.tpl'}
		</footer>
	</div>
</body>
</html>
