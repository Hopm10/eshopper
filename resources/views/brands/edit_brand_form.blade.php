



  @extends('layouts.master')

  @section('title')

  <title>Sửa thương hiệu</title>

  @endsection

  @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action=" {{ route('brands.update', $brand->id) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" name="brand" id="" class="form-control" value="{{ $brand->name }}">
                        <button type= "submit" class="btn btn-outline-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  @endsection

  @section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  @endsection




