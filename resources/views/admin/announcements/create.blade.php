@extends('layouts.app')

@section('title', 'Admin panel - Create')

@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif
    <form class="mt-2" method="POST" action="{{ route('admin.announcements.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="input-group control-group increment">
            <input type="file" name="images[]" class="form-control">
            <div class="input-group-btn"> 
                <button id="add-image" class="btn btn-success" type="button">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add
                </button>
            </div>
        </div>
        <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="images[]" class="form-control">
                <div class="input-group-btn"> 
                    <button id="remove-image" class="btn btn-danger" type="button">
                        <i class="glyphicon glyphicon-remove"></i>
                        Remove
                    </button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        let imageCounter = 1;

        $(document).ready(function() {
          $("#add-image").click(function(){
              if (imageCounter >= 5) {
                  alert('You can upload maximum 5 photos per announcement.');
                  return;
              }

              const html = $(".clone").html();
              $(".increment").after(html);
              imageCounter ++;
          });

          $("body").on("click","#remove-image",function(){ 
              $(this).parents(".control-group").remove();
              imageCounter --;
          });
        });
    </script>
@endsection
