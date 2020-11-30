
  @extends('layouts.master')

  @section('title')

  <title>Quản lý sản phẩm</title>

  @endsection

  @section('content')
    <div class="container-fluid">
        <a href="{{ route('products.create') }}" class="btn btn-outline-success mt-2 mb-2"><i class="fas fa-plus"></i>  Add Product</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td col-2><img src="{{ asset('/storage/images/') .'/'. $product->image }}" alt="image" height="30"></td>
                        <td col-4>{{ $product->title }}</td>
                        <td col-4>{{ $product->description }}</td>
                        <td col-2>
                            <div class="row">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <div class="col-1">
                                <form  method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div> </div>
                        </td>
                    </tr>
                @endforeach



            </tbody>

        </table>{{$products->links()}}
    </div>
  @endsection

  @section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  @endsection

