<x-admin.panel>
    @section('style')
    @endsection
    @section('content')

            <div class="input-group " style="width: 100%; margin-top: 100px; align-items: center">
                @error('link')
                <div class="text-danger">{{ $message }}</div>
                @enderror<br>
                <form method="post"  class="input-group" action="{{route('admin.create.link')}}" enctype="multipart/form-data">
                    @csrf

                    <input id="link" name="link" type="text"
                           style="height: 50px;
                            margin-bottom: 50px;
                            border-bottom-left-radius: 20px;
                            border-top-left-radius: 20px;"

                           class="form-control" placeholder="Enter url.." aria-label="Search" aria-describedby="basic-addon2">
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


                <div class="alert-success"
                     style="width: 100%;
                         padding: 15px;
                         border-radius: 10px;">Your Short link is: </div>
            </div>





    @endsection


</x-admin.panel>
