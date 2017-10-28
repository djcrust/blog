<div class="modal fade" id="modal_category" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create new Category</h4>
            </div>

            <div class="modal-body">

                <form action = "createCategory" method="POST" id ="frmCategory">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >

                    <input type="hidden" name="category_id" id="category_id">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required="required">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-modal_create">Create</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
