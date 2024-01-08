<div class="modal fade" id="modal-impersonate" tabindex="-1" role="dialog" aria-labelledby="modal-impersonate-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-impersonate-label"><i class="fa fa-lg fa-user-secret" aria-hidden="true"></i> Impersonate User</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modal-impersonate-select">User to Impersonate</label>
                        <select id="modal-impersonate-select" class="form-control" placeholder="Select a user...">
                            <option value="" selected="selected">Select a user...</option>
                            <option value="all">All</option>
                            <?php
                                if(isset($users)) {
                                    foreach($users as $user) {
        								echo "<option value=\"".htmlentities($user)."\">".htmlentities($user)."</option>";
                                    }
                                }
							?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="modal-impersonate-submit">Impersonate</button>
            </div>
        </div>
    </div>
</div>