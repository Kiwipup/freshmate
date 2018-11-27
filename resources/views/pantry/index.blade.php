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


        <div class="col-3 card ml-3 mt-3 border {$item->expiration_date ? border-success : border-danger}">

          <form action="/pantry/{{ $item->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn bg-transparent float-right" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
          </form>
          <a class="btn btn-success mb-2" href="">Add to Restock List <i class="fas fa-check"></i></a>
            <div class="card-header {$item->expiration_date ? bg-success : bg-danger}">

            {{$item->item}}
          </div>
            <div class="card-body">
            {!! $item->description ? $item->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            {!! $item->expiration_date ? "Expires: " . $item->expiration_date : '<span class="text-black-50">(No Expiration Date)</span>' !!}
            <p>Quantity: {{$item->quantity}}</p>
          </div>
        </div>





@endforeach
</div>
@endsection
