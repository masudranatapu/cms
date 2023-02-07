<form action="{{ route('admin.industry.update',$insdustry->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Insdustry Name</label>
        <input type="text" name="name" id="name" value="{{ $insdustry->name }}" class="form-control" placeholder="Insdustry Name"
            required>
    </div>
    <div class="form-group">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="text" name="order_number" id="order_number" value="{{ $insdustry->order_number }}" class="form-control" placeholder="Order Number"
            required>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Published Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1" {{ $insdustry->status == 1? "selected" : "" }}>Published</option>
            <option value="0" {{ $insdustry->status == 0? "selected" : "" }}>Unpublished</option>
        </select>
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>