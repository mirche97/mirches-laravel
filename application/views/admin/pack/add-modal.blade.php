
<div id="add-pack-modal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Add new pack</h3>
    </div>
    <div class="modal-body">
        <label>Amount</label>
        <input type="text" name="amount"/>
        <label>UOM</label>
        {{ $uom }}
    </div>
    <div class="modal-footer">
        <a href="#" class="btn close">Close</a>
        <a href="#" class="btn btn-primary" id="add-pack-btn">Add</a>
    </div>
</div>

