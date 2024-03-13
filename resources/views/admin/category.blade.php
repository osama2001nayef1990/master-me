<x-admin.panel>
    @section('style')

    @endsection
    @section('content')
        @if(session()->has('create'))
            <div class="alert alert-success">The category was created successfully</div>
        @elseif(session()->has('delete'))
                    <div class="alert alert-danger">The category was deleted</div>
        @elseif(session()->has('update'))
             <div class="alert alert-success">The category was updated</div>
        @endif
            <div class="row">
                <br>
                <div class="input-group " style=" margin-top: 90px; align-items: center">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror<br>
                <form method="post"  class="input-group" action="{{route('admin.create.category')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="name" name="name" type="text"
                           style="height: 50px;
                            margin-bottom: 50px;
                            border-bottom-left-radius: 20px;
                            border-top-left-radius: 20px;"

                           class="form-control" placeholder="Enter category name.." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <input
                            type="submit"
                            class="btn"
                            style="
                                height: 50px;
                                margin-bottom: 50px;
                                border-bottom-right-radius: 20px;
                                border-top-right-radius: 20px;
                                border-bottom-left-radius: 0px;
                                border-top-left-radius: 0px;
                                border-color: transparent;
                                border-left-color: gray;
                                border-top-left-radius: 0px;
                                background-color: rgb(42, 48, 56);"
                            value="Create"
                        >

                    </div>


                </form>

            </div>
            </div>
            <div class="row">
                <div class=" grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category Table</h4>
                            <p class="card-description"> Add class <code>.table-hover</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\Category::all() as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                @if($category->created_at ==null) Null
                                                @else
                                                    {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($category->updated_at ==null) Null
                                                @else
                                                    {{Carbon\Carbon::parse($category->updated_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                            <td>
                                                <form method="GET" action="{{route('admin.category.edit.view',$category)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="submit" class="btn btn-primary" value="Edit">
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('admin.category.delete',$category)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection
</x-admin.panel>
