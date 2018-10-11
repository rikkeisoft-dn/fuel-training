<h2>{$post.title}</h2>

<p>
    <strong>Posted: </strong>{date('nS F, Y', $post.created_at)} ({Date::time_ago($post.created_at)})
    by {$post.user.username}
</p>

<p>{nl2br($post.body)}</p>

<hr />

<h3 id="comments">Comments</h3>

{foreach $post.comments as $comment}

    <p>{html_anchor href=$comment.website text=$comment.name} said "{$comment.message}"</p>

{/foreach}

<h3>Write a comment</h3>

{Form::open(['action' => 'blog/comment/'|cat: $post.slug, 'onsubmit' => 'return check_validate()'])}

<div class="row">
    <label for="name">Name:</label>
    <div class="input">{Form::input('name')}</div>
</div>

<div class="row">
    <label for="website">Website:</label>
    <div class="input">{Form::input('website')}</div>
</div>

<div class="row">
    <label for="email">Email:</label>
    <div class="input">{Form::input('email')}</div>
</div>

<div class="row">
    <label for="message">Comment:</label>
    <div class="input">{Form::textarea('message')}</div>
</div>

<div class="row">
    <div class="input">{Form::submit('submit')}</div>
</div>

{Form::close()}

{literal}
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
{/literal}
