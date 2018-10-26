<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Summary</th>
			<th>Body</th>
			<th>User name</th>
			<th width="250">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $item): ?>
		<tr>
			<td><?php echo $item->title; ?></td>
			<td><?php echo Str::truncate($item->summary, 20, '...'); ?></td>
			<td><?php echo Str::truncate($item->body, 200, '...'); ?></td>
			<td><?php echo $item->user->username; ?></td>
			<td>
				<?php echo Html::anchor('blog/view/'.$item->slug, 'View', array('class' => 'btn btn-info', 'target' => '_blank')); ?> |
				<?php echo Html::anchor('admin/posts/edit/'.$item->id, 'Edit', array('class' => 'btn btn-warning')); ?> |
				<?php echo Html::anchor('admin/posts/delete/'.$item->id, 'Delete', array(
					'onclick' => "return confirm('Are you sure?')",
					'class' => 'btn btn-danger'
				)); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/posts/create', 'Add new Post', array('class' => 'btn btn-success')); ?>
</p>
