<h2>Recent Posts</h2>

{foreach $posts as $post}

    <h3>{html_anchor href='blog/view/'|cat: $post.slug text=$post.title}</h3>

    <p>{$post.summary}</p>

{/foreach}