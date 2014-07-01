<?php $presenter = new Mualnuam\ZurbPresenter($paginator); ?>

@if ($paginator->getLastPage() > 1)
<div class="pagination-centered">
   <ul class="pagination">
      {{ $presenter->render(); }}
   </ul>
</div>
@endif
