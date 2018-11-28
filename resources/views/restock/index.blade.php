@extends('layouts.dashboard')

@section('nav-link')
<a class="nav-link" href="/pantry">Dashboard</a>
@endsection

@section('dashcontent')
<div class="d-flex justify-content-center">
<div class="col-8">
<a class="btn btn-success mb-2 mt-2" data-toggle="collapse" href="#addFormTwo">Add Item <i class="ml-2 fas fa-plus"></i></a>

<form id="addFormTwo" class="collapse form clearfix p-3 mt-3" action="" method="post">
    @csrf
    <div class="form-group">
        <label for="item_name" class="font-weight-bold">Item Name</label>
        <input type="text" class="form-control" id="restock_name" name="item_name" placeholder="New Item Name..." >
    </div>
    <div class="form-group">
        <label for="item_description" class="font-weight-bold">Item Description (optional)</label>
        <textarea type="text" class="form-control" id="restock_description" name="item_description" placeholder="About this item..." ></textarea>
    </div>
    <div class="form-group">
        <label for="quantity" class="font-weight-bold">Quantity</label>
        <input type="number" class="form-control" name="quantity" min="1" max="50" id="quantity">
    </div>

    <button type="submit" class="btn btn-success float-left">Save</button>
  </form>
</div>
</div>
    <div class="row mt-4 flex-center">
      @if (Auth::user()->restocks->count() == 0)

        <div class="empty text-center p-2 font-weight-light">
            <p class="pt-4">Your Restock list is empty...</p>
            <p >Click the "Add Item" button to get started!</p>
        </div>

    @endif
  @foreach (Auth::user()->restocks as $restock)


        <div class="col-3 card ml-3 mt-3 border border-success">

          <form action="/restock/{{ $restock->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn bg-transparent float-right" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
          </form>
          <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#restockModal">Add to Inventory <i class="fas fa-check"></i></button>
          <!-- Modal -->
          <div class="modal fade" id="restockModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <form id="restockModalForm" class="form clearfix p-3 mt-3" action="/pantry/index" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="item_name" class="font-weight-bold">Item Name</label>
                          <input type="text" class="form-control" id="item_name" name="item_name" value="{{$restock->item_name}}">
                      </div>
                      <div class="form-group">
                          <label for="item_description" class="font-weight-bold">Item Description (optional)</label>
                          <textarea type="text" class="form-control" id="item_description" name="item_description" placeholder="About this item..." >{{$restock->description}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="expiration" class="font-weight-bold">Expiration Date</label>
                          <input type="date" class="form-control" name="expiration" id="expiration">
                      </div>
                      <div class="form-group">
                          <label for="quantity" class="font-weight-bold">Quantity</label>
                          <input type="number" class="form-control" name="amount" min="1" max="50" id="quantity" value="{{$restock->amount}}">
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
            <div class="card-header bg-success">

            {{$restock->item_name}}
          </div>
            <div class="card-body">
            {!! $restock->description ? $restock->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
          </div>
          <div class="card-footer bg-transparent">
            Quantity: {{$restock->amount}}

          </div>
        </div>





@endforeach
</div>
@endsection
