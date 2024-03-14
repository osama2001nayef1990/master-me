<x-admin.panel>
    @section('content')
        @if(session()->has('create'))
            <div class="alert alert-success">The category was created successfully</div>
        @elseif(session()->has('delete'))
            <div class="alert alert-danger">The link was deleted</div>
        @elseif(session()->has('update'))
            <div class="alert alert-success">The category was updated</div>
        @endif
        <div class="row">
            <div class=" grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Links Table</h4>
                        <p class="card-description"> Add class <code>.table-hover</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Category</th>
                                    <th>Short Link</th>
{{--                                    <th>Long Link</th>--}}
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\Link::all() as $link)
                                    <tr>
                                        <td>{{$link->id}}</td>
                                        <td>{{$link->user->name}}</td>
                                        <td>{{$link->user->email}}</td>
                                        <td>{{\App\Models\Category::all()->find($link->category_id)->name}}</td>
                                        <td>{{$link->short_url}}</td>
{{--                                        <td>{{$link->long_url}}</td>--}}
                                        <td>
                                            <form method="POST" action="{{route('link.edit.view',$link)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <input type="submit" class="btn btn-success" value="Edit">
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('link.delete',$link)}}" enctype="multipart/form-data">
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
