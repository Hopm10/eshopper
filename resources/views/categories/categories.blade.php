


  @extends('layouts.master')

  @section('title')

  <title>Sửa sản phẩm</title>

  @endsection


  @section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th scope="col">STT</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Option</th>
                              </tr>
                          </thead>

                          @foreach ($list_categories as $key => $category)
                              <tbody>
                                  <tr>
                                      <th scope="row">{{ $key +1 }}</th>
                                      <td>{{ $category->name }}</td>
                                      <td>
                                          <div class="row">
                                              <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-outline-info"><i class="fas fa-edit"></i> Edit</a>
                                              <a href=""><div class="col-1">
                                                  <form  method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button class="btn btn-outline-danger" type="submit">Delete</button>
                                                  </form>
                                              </div></a>
                                          </div>
                                      </td>
                                  </tr>
                              </tbody>
                          @endforeach
                      </table>
                      {{ $list_categories->links()}}
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                        <a href="{{ route('categories.create') }}" class="btn btn-outline-success">Create</a>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  @endsection

    @section('script')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @endsection
