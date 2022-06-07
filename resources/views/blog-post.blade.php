<x-home-master>

@section('content')

 <!-- Title -->
 <h1 class="mt-4">{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  by
  <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>Posted on {{$post->created_at}}</p>


<!-- Preview Image -->
<img  class="img-fluid rounded {{$post->post_image ?? 'd-none'}}" src="{{asset($post->post_image)}}" alt="No Image">

<hr>

<!-- Post Content -->
<p class="lead">{{$post->body}}</p>


<hr>


@endsection

</x-home-master>