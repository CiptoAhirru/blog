@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">
            {{-- jika menggunakan {{  }} maka diescape HTML --}}
            <h2 class="mb-3">{{ $post->judul }}</h2>

           <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> to my Posts</a>
           <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
           <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="POST">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('are you sure ?')"><span data-feather="x-circle"></span> Delete</button>
          </form>

          @if ($post->image)
          <div>
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          </div>
          @else  
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
          @endif

            <article class="my-3 fs-5">
                {{-- jika menngunakan {!!  !!} maka tidak di escape HTML --}}
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection