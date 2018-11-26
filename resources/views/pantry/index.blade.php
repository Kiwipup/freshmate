@extends('layouts.dashboard')


@section('dashcontent')
<a class="btn btn-success mb-2 mt-2" data-toggle="collapse" href="#addForm">Add Item <i class="ml-2 fas fa-plus"></i></a>

<form id="addForm" class="collapse form clearfix pb-3" action="" method="post">
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

    <button type="submit" class="btn btn-success float-left">Save</button>
  </form>
    <div class="row mt-4 flex-center">
  @foreach (Auth::user()->items as $item)


        <div class="col-3 card ml-3 border {$item->expiration_date ? border-success : border-danger}">
            <div class="card-header bg-transparent">
              <form action="/pantry/{{ $item->id }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn" type="submit"><i class="text-danger fas fa-trash-alt"></i></button>
              </form>
            {{$item->item}}
          </div>
            <div class="card-body">
            {!! $item->description ? $item->description : '<span class="text-black-50">(No Description)</span>' !!}<br />
            {{ $item->expiration_date }}
          </div>
        </div>





@endforeach
</div>
@endsection
