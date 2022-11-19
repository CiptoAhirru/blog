@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center`mb-5">
        <div class="col-md-8">
            {{-- jika menggunakan {{  }} maka diescape HTML --}}
            <h2 class="mb-3">{{ $post->judul }}</h2>

            <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/home?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        @if ($post->image)
          <div style="max-height: 350px; oveflow:hidden ">
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
          </div>
          @else  
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          @endif

            <article class="my-5 fs-5">
                {{-- jika menngunakan {!!  !!} maka tidak di escape HTML --}}
                {!! $post->body !!}
            </article>
        
            <a href="/home" class="d-block mt-3">Back to Home</a>
        </div>
    </div>
</div>

        
@endsection    

