<div class="col-lg-12">
    <div class="pageination">
        <nav aria-label="Page navigation example">
            {!! $result['products']->withQueryString()->links('pagination::bootstrap-5') !!}
        </nav>
    </div>
</div>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
