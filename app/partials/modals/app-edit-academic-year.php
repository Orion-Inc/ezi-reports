<div tabindex="-1" role="dialog" aria-labelledby="edit-academic-year-label" class="modal in" id="edit-academic-year-modal">
    <div role="document" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="edit-academic-year-label" class="modal-title">Edit Academic Year</h4>
            </div>
            <form>
                <input class="hidden" type="text" name="school_code" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="school_name">From</label>
                                <input id="school_name" type="text" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="school_name">To</label>
                                <input id="school_name" type="text" class="form-control" value="" readonly="">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="school_name">Term</label>
                                <select class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline btn-success">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>