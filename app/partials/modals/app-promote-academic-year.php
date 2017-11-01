<div tabindex="-1" role="dialog" aria-labelledby="promote-academic-year-label" class="modal in" id="promote-academic-year-modal" data-fetch="../includes/actions/school/get-academic-year.php">
    <div role="document" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="promote-academic-year-label" class="modal-title">Promote to Next Term</h4>
            </div>
            <form class="app-form" method="POST" action="../includes/actions/school/promote-academic-year.php" id="school-promote-academic-year">
                <div class="modal-body">
                    <input type="text" id="school_academic_term" name="school_academic_term">
                    <input type="text" name="school_current_academic_year" id="school_current_academic_year">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline btn-success">Yes</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">No</button>
                </div>
            </form>
        </div>
    </div>
</div>