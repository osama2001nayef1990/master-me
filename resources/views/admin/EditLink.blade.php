<x-admin.panel>
    @section('content')

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Link</h4>
                        <p class="card-description"> Basic form layout </p>
                        <form class="forms-sample" method="post" action="{{route('link.edit',$link)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="id">Link ID</label>
                                <input type="text" class="form-control bg-black" name="id" id="id" value="{{$link->id}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="link">Long Link</label>
                                <input type="text" class="form-control" name="link" id="link" value="{{$link->long_url}}">
                                @error('link')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="shortlink">Short Link</label>
                                <input type="text" class="form-control bg-black" name="shortlink" id="shortlink" value="{{$link->short_url}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach(Auth::user()->categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id == $link->category_id)
                                                    selected
                                               @endif>
                                            {{$category->name}}
                                        </option>
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
                                        <option value="{{$domain->id}}"
                                                @if($domain->id == $link->domain_id)
                                                    selected
                                                @endif>
                                        {{$domain->domain}}</option>
                                    @endforeach
                                </select>
                                @error('domain')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>

{{--                                <form method="get" action="{{route('qr.create')}}" >--}}
{{--                                    <input type="submit" class="btn btn-success " value="Create Qr Code">--}}
{{--                                </form>--}}

{{--                                <button type="submit" class="btn btn-success" formaction="{{route('qr.create',$link)}}">--}}
{{--                                    Create Qr Code--}}
{{--                                </button>--}}

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin.panel>
