<form action="{{ route('admin.category.update',$country->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $country->name }}" class="form-control" placeholder="Category name"
            required>
    </div>

    <div class="form-group">
        <label for="code" class="form-label">Category Code</label>
        <input type="text" name="code" id="code" value="{{ $country->code }}" class="form-control" placeholder="Category code" required>
    </div>

    <div class="form-group float-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
