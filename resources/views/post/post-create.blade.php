<x-admin-master>

    @section('content')

    
  
    
    <div class="container">

      @if(Session::has('message'))
      <div class="alert alert-success"> {{Session::get('message')}}    </div>
       @endif  

      <h1 >Create Post</h1>
    {!! Form::open( ['method'=>'POST' ,'action'=>'\App\Http\Controllers\PostController@store' , 'files'=>true] ) !!}        <!-- can also use , 'url'=>'/posts' -->

    <div class="form-group">
    {!! Form::label('title', 'Title:' , ['class'=> 'class'])  !!}
    {!! Form::text('title', Null , ['class'=> 'form-control', 'placeholder' => 'Enter title']) !!}
    @error('title')
        {{$message}}
    @enderror
    </div>
   
    <div class="form-group">
    {!! Form::label('body', 'Body:' , ['class'=> 'class'])  !!}
    {!! Form::textarea('body', Null , ['class'=> 'form-control','placeholder' =>  'Enter Body Text' ]) !!}

    @if ($errors->has('body'))
          {{ $errors->first('body') }}
    @endif
    </div> 
    

    <div class="form-group">
    {!! Form::hidden('user_id', Auth::user()->id ) !!}
    </div>
    
    {!! Form::file('file', ['class'=>'fileclass', 'accept' => "image/*"]) !!}
    <br><br>
    @csrf

    {!! Form::submit( 'SUBMIT' ) !!}
    
    
    {!! Form::close() !!}
</div>


    @endsection
</x-admin-master>