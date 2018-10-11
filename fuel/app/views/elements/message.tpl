{if (Session::get_flash('success'))}
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{implode('</div><div>', (array) Session::get_flash('success'))}</p>
</div>
{/if}

{if (Session::get_flash('error'))}
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p>{implode('</div><div>', (array) Session::get_flash('error'))}</p>
</div>
{/if}
