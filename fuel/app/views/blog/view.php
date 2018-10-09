<h2><?php echo $post->title ?></h2>

<p>
    <strong>Posted: </strong><?php echo date('nS F, Y', $post->created_at) ?> (<?php echo Date::time_ago($post->created_at)?>)
    by <?php echo $post->user->username ?>
</p>

<p><?php echo nl2br($post->body) ?></p>

<hr />

<h3 id="comments">Comments</h3>

<?php foreach ($post->comments as $comment): ?>

    <p><?php echo Html::anchor($comment->website, $comment->name) ?> said "<?php echo $comment->message?>"</p>

<?php endforeach; ?>

<h3>Write a comment</h3>

<?php echo Form::open(['action' => 'blog/comment/'.$post->slug, 'onsubmit' => 'return check_validate()']) ?>

<div class="row">
    <label for="name">Name:</label>
    <div class="input"><?php echo Form::input('name'); ?></div>
</div>

<div class="row">
    <label for="website">Website:</label>
    <div class="input"><?php echo Form::input('website'); ?></div>
</div>

<div class="row">
    <label for="email">Email:</label>
    <div class="input"><?php echo Form::input('email'); ?></div>
</div>

<div class="row">
    <label for="message">Comment:</label>
    <div class="input"><?php echo Form::textarea('message'); ?></div>
</div>

<div class="row">
    <div class="input"><?php echo Form::submit('submit'); ?></div>
</div>

<?php echo Form::close() ?>

<script type="application/javascript">
    function check_validate() {
        if ($('input[name=name]').val() == '') {
            alert('The name is required and must contain a value.');
            return false;
        }

        if ($('input[name=email]').val() == '') {
            alert('The email is required and must contain a value.');
            return false;
        } else if (!$('input[name=email]').val().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
            alert('The email must contain a valid email address.');
            return false;
        }

        if ($('textarea[name=message]').val() == '') {
            alert('The comment is required and must contain a value.');
            return false;
        }
    }
</script>
