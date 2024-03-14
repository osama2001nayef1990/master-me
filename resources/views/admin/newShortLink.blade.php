<x-admin.panel>
    @section('content')

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Link</h4>
                        <p class="card-description"> Basic form layout </p>
                        <form class="forms-sample" method="POST" action="{{route('admin.create.link')}}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="Paste url link..">
                                @error('link')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach(Auth::user()->categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="domain">Domain</label>
                                <select class="form-control" id="domain" name="domain">
                                    @foreach(\App\Models\Domain::all() as $domain)
                                        <option value="{{$domain->id}}">{{$domain->domain}}</option>
                                    @endforeach
                                </select>
                                @error('domain')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                                <div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin.panel>
