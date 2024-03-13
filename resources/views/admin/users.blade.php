<x-admin.panel>
    @section('content')

        <div class="row">
            <div class=" grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Table</h4>
                        <p class="card-description"> Add class <code>.table-hover</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Is Admin</th>
                                    <th>Is Active</th>
                                    <th>Block</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\User::all() as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->is_admin}}</td>
                                        <td>{{$user->is_active}}</td>
                                        <td>
                                            @if($user->is_active)
                                                <form method="POST" action="{{route('admin.user.block',$user)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="submit" class="btn btn-danger" value="Block">
                                                </form>
                                            @elseif(!$user->is_active)
                                                <form method="POST" action="{{route('admin.user.activate',$user)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="submit" class="btn btn-success" value="Activate">
                                                </form>
                                            @endif

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
