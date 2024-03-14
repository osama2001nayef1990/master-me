<x-admin.panel>
    @section('content')

        <div class="row" style="justify-content: center;">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit category</h4>
                        <p class="card-description"> Basic form layout </p>
                        <form class="forms-sample" method="POST" action="{{route('admin.category.edit',$category)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" style="background-color: rgb(18, 20, 23)" id="id" value="{{$category->id}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div>

                                    <button type="submit" class="btn btn-primary me-2">Submit</button>

{{--                                <form method="get" action="{{}}">--}}
{{--                                    <input type="submit" onclick="{{redirect()->back()}}" class="btn btn-dark" value="Cancel">--}}
{{--                                </form>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin.panel>
