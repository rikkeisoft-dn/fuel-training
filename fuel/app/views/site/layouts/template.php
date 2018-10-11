<!DOCTYPE html>
<html>
<head>
	<?php echo View::forge('site/layouts/header', compact('title')); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $title; ?></h1>
				<hr>
				<?php echo View::forge('elements/message'); ?>
			</div>
			<div class="col-md-12">
				<?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer>
			<?php echo View::forge('site/layouts/footer'); ?>
		</footer>
	</div>
</body>
</html>
