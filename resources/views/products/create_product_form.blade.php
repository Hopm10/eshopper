
  @extends('layouts.master')

  @section('title')

  <title>Thêm sản phẩm</title>

  @endsection


            @section('content')

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="container">
                                    <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input required type="file" name="image" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select name="category" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect2">Brand</label>
                                    <select name="brand" class="form-control" id="exampleFormControlSelect2">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" > {{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Description</label>
                                        <input name="description" type="text" class="form-control" id="exampleFormControlInput2" >
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Detail Description</label>
                                    <textarea name="detail_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Price</label>
                                    <input name="price" type="number" class="form-control" id="exampleFormControlInput3" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput4">Quantity</label>
                                    <input name="quantity_in_stock" type="number" class="form-control" id="exampleFormControlInput4" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput5">Quantity Sold</label>
                                    <input name="quantity_sold" type="number" class="form-control" id="exampleFormControlInput5" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput6">Sale</label>
                                    <input name="sale" type="number" class="form-control" id="exampleFormControlInput6" placeholder="%" >
                                </div>


                                    <button type="submit" class="btn btn-outline-success">Create</button>
                            </form>

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

