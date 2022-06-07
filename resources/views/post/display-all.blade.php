<x-admin-master>
    @section('content')
        
    

<!-- Begin Page Content -->
<div class="container-fluid">

    @if(Session::has('message'))
        @if(session('action') == 'delete')
            <div class="alert alert-danger"> {{Session::get('message')}}    </div>
        @endif

        @if(session('action') == 'create')
            <div class="alert alert-success"> {{Session::get('message')}}    </div>
        @endif
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>UserId</th>
                            <th>Created at</th>
                            <th>Open</th>
                            <th>action</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th>action</th>
                            <th>action</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                            
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td><a class='btn btn-secondary' href="{{route('posts.show',['post'=>$post->id])}}">View</a></td>
                            <td>
                              
                                {!! Form::open(['method'=>'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}

                                @csrf
                                {!! Form::submit( 'DELETE' , ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>publish/unpublish</td>
                        </tr>


                        @endforeach

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


    @endsection


    @section('scripts')
         <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('vendor/js/demo/datatables-demo.js')}}"></script>
    @endsection


</x-admin-master>