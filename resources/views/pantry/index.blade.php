@extends('layouts.dashboard')

@section('dashcontent')
<div class="d-flex justify-content-center">
<div class="col-8">
<a class="btn btn-success mb-2 mt-2" data-toggle="collapse" href="#addForm">Add Item <i class="ml-2 fas fa-plus"></i></a>

<form id="addForm" class="collapse form clearfix p-3 mt-3" action="" method="post">
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
    <div class="row mt-4 flex-center">
      @if (Auth::user()->items->count() == 0)

        <div class="empty text-center p-2 font-weight-light">
            <p class="pt-4">Your inventory is empty...</p>
            <p >Click the "Add Item" button to get started!</p>
        </div>

    @endif
  @foreach (Auth::user()->items as $item)


        <div class="col-lg-3 col-md-5 col-sm-12 card ml-3 mt-3 border {$item->expiration_date ? border-success : border-danger}">

          <form action="/pantry/{{ $item->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn bg-transparent float-right" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
          </form>
          <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#pantryModal">Add to Shopping List <i class="fas fa-check"></i></button>

  <!-- Modal -->
  <div class="modal fade" id="pantryModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="pantryModalForm" class="form clearfix p-3 mt-3" action="/restock/index" method="post">
              @csrf
              <div class="form-group">
                  <label for="item_name" class="font-weight-bold">Item Name</label>
                  <input type="text" class="form-control" id="modal_item_name" name="item_name" value="{{$item->item}}">
              </div>
              <div class="form-group">
                  <label for="item_description" class="font-weight-bold">Item Description (optional)</label>
                  <textarea type="text" class="form-control" id="restock_description" name="item_description" placeholder="About this item..." ></textarea>
              </div>
              <div class="form-group">
                  <label for="quantity" class="font-weight-bold">Quantity</label>
                  <input type="number" class="form-control" name="quantity" min="1" max="50" id="quantity" value="{{$item->quantity}}">
              </div>

              <button type="submit" class="btn btn-success float-left">Save</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
            <div id="card_item_name" class="card-header {$item->expiration_date ? bg-success : bg-danger}">

            {{$item->item}}
          </div>

            <div class="card-body">
            {!! $item->description ? $item->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            {!! $item->expiration_date ? "Expires: " . $item->prettyUpdate() : '<span class="text-black-50">(No Expiration Date)</span>' !!}
            <p>Quantity: {{$item->quantity}}</p>
          </div>
        </div>





@endforeach
</div>
@endsection
