@props(['horoscopes'])
<div class="row mt-3">
    <div class="col-md-12 justify-content-center d-flex">
        {{ $horoscopes->onEachSide(5)->links('vendor.pagination.custom')}}
    </div>
</div>
