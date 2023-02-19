<form action="{{ route('admin.category.update',$region->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $region->name }}" class="form-control" placeholder="Category name"
            required>
    </div>
    <div class="form-group">
        <label for="order_number" class="form-label">Order Number</label>
        <input type="number" name="order_number" id="order_number" value="{{ $region->order_number }}" class="form-control" placeholder="Order Number"
            required>
    </div>
    <div class="form-group">
        <label for="status" class="form-label">Published Status</label>
        <select name="status" id="status" class="form-control">
            <option value="1" {{ $region->status == 1? "selected" : "" }}>Published</option>
            <option value="0" {{ $region->status == 0? "selected" : "" }}>Unpublished</option>
        </select>
    </div>
    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
