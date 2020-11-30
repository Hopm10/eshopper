

  @extends('layouts.master')

  @section('title')

  <title>Sửa sản phẩm</title>

  @endsection



  @section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8">
               <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
    <div class="container">
        <form>

            <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $product->title }}" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="hidden" name="image_old" value="{{ $product->image }}">
                <img src="{{ asset('/storage/images/') .'/'. $product->image }}" alt="" width="200" height="200">
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
                @foreach ($categories as $category)
                    <option @if ($product->category_id == $category->id)
                        selected
                    @endif value="{{ $category->id }}" >{{ $category->name }}</option>
                @endforeach

            </select>
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect2">Brand</label>
            <select name="brand" class="form-control" id="exampleFormControlSelect2">
                @foreach ($brands as $brand)
                    <option @if ($product->brand_id == $brand->id)
                        selected
                    @endif value="{{ $brand->id }}" > {{$brand->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Description</label>
                <input name="description" type="text" class="form-control" id="exampleFormControlInput2" value="{{$product->description}}" >
            </div>

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Detail Description</label>
            <textarea name="detail_description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$product->detail_description}}</textarea>
            </div>
        </form>
        <div class="form-group">
            <label for="exampleFormControlInput3">Price</label>
            <input name="price" type="number" class="form-control" id="exampleFormControlInput3" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Quantity</label>
            <input name="quantity_in_stock" type="number" class="form-control" id="exampleFormControlInput4" value="{{$product->quantity_in_stock}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput5">Quantity Sold</label>
            <input name="quantity_sold" type="number" class="form-control" id="exampleFormControlInput5" value="{{$product->quantity_sold}}" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput6">Sale</label>
            <input name="sale" type="number" class="form-control" id="exampleFormControlInput6" value="{{$product->sale}}" >
        </div>


            <button type="submit" class="btn btn-outline-primary">Update</button>
        </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'exampleFormControlTextarea1', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        </script>
    </div>
          </div>
      </div>
  </div>

  @endsection

  @section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'exampleFormControlTextarea1', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

  @endsection
