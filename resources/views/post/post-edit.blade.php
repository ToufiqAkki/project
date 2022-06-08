<x-admin-master>

    @section('content')

    <div class="container">

      {{-- @if(Session::has('message'))
      <div class="alert alert-success"> {{Session::get('message')}}    </div>
       @endif   --}}

      <h1 >Update Post</h1>

      
    {!! Form::open( ['method'=>'PATCH' ,'route'=>['posts.update',$post->id] , 'files'=>true] ) !!}        <!-- can also use , 'url'=>'/posts' -->

    <div class="form-group">
    {!! Form::label('title', 'Title:' , ['class'=> 'class'])  !!}
    {!! Form::text('title', $post->title , ['class'=> 'form-control', 'placeholder' => 'Enter title']) !!}
    @error('title')
        {{$message}}
    @enderror
    </div>
   
    <div class="form-group">
    {!! Form::label('body', 'Body:' , ['class'=> 'class'])  !!}
    {!! Form::textarea('body', $post->body , ['class'=> 'form-control','placeholder' =>  'Enter Body Text' ]) !!}

    @if ($errors->has('body'))
          {{ $errors->first('body') }}
    @endif
    </div> 
    

    <div class="form-group">
    {!! Form::hidden('user_id', Auth::user()->id ) !!}
    </div>
    
    <div class='image {{ $post->post_image ?? 'd.none' }}'><img id='update_image' height="200px" src="{{asset($post->post_image)}}" alt=""> </div>

    {!! Form::file('file', ['id'=>'file', 'value'=>$post->post_image , 'class'=>'fileclass', 'accept' => "image/*"]) !!}
    <br><br>
    @csrf

    {!! Form::submit( 'SUBMIT' ) !!}
    
    
    {!! Form::close() !!}
    </div>


    @endsection


    @section('scripts')
    <script src="{{asset('js/custom_jquery.js')}}"></script>
    @endsection
</x-admin-master>