
<div id="add-product-modal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Add new product</h3>
    </div>
    <div class="modal-body">
        <label>Ingridient</label>
        {{$ingridientlookup}}
        <label>Pack</label>
        {{$packlookup}}
        <label>Brand</label>
        {{$brandlookup}}
    </div>
    <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary" id="add-product-btn">Add</a>
    </div>
</div>

