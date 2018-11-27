@extends(layouts.app)

@section('content')
<div class="d-flex justify-content-center">
<div class="col-8">

<form id="addForm3" class="collapse form clearfix p-3 mt-3" action="" method="post">
    @csrf
    <div class="form-group">
        <label for="item_name" class="font-weight-bold">Item Name</label>
        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="New Item Name..." >
    </div>
    <div class="form-group">
        <label for="item_description" class="font-weight-bold">Item Description (optional)</label>
        <textarea type="text" class="form-control" id="item_description" name="item_description" placeholder="About this item..." ></textarea>
    </div>
    <div class="form-group">
        <label for="expiration" class="font-weight-bold">Expiration Date</label>
        <input type="date" class="form-control" name="expiration" id="expiration">
    </div>
    <div class="form-group">
        <label for="quantity" class="font-weight-bold">How many do you have?</label>
        <input type="number" class="form-control" name="amount" min="1" max="50" id="amount">
    </div>

    <button type="submit" class="btn btn-success float-left">Save</button>
  </form>
</div>
</div>
@endsection
