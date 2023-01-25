<div class="modal fade bg-main" id="confirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete the record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="ask-confirm"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="" id="form_delete" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn" type="submit">Delete <i class="fa-solid fa-folder-minus text-danger"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
