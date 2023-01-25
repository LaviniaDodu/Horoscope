@props(['signs'])
<div class="modal fade bg-main" id="editRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit the record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="form_edit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" id="date_input">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sign</label>
                        <select name="sign" class="form-control">
                            <option id="sign_input" class="m_title"></option>
                            @foreach($signs as $sign => $value)
                                <option value="{{ $sign }}" class="m_title">{{ $sign }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="desc_input"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn" type="submit">Save <i class="fa-solid fa-check-double"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
