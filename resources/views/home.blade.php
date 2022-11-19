@extends('layout.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/home">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>

    @if ($homed->count())
    <div class="card mb-3">
      @if ($homed[0]->image)
      <div class="row">
          <img src="{{ asset('storage/' . $homed[0]->image) }}" alt="{{ $homed[0]->category->name }}" class="img-fluid">
      </div>
      @else  
        <img src="https://source.unsplash.com/1200x400?{{ $homed[0]->category->name }}" class="card-img-top" alt="{{ $homed[0]->category->name }}">
      @endif
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/home/{{ $homed[0]->slug }}" class="text-decoration-none text-dark">{{ $homed[0]->judul }}</a></h3>
          <p>
            <small class="text-muted">
            By. <a href="/home?author={{ $homed[0]->user->username }}" class="text-decoration-none">{{ $homed[0]->user->name }}</a> in <a href="/home?category={{ $homed[0]->category->slug }}" class="text-decoration-none">{{ $homed[0]->category->name }}</a> {{ $homed[0]->created_at->diffForHumans() }}
        </small>
        </p>
          <p class="card-text">{{ $homed[0]->excerpt }}</p>
          <a href="/home/{{ $homed[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
      </div>


<div class="container">
    <div class="row">
        @foreach ($homed->skip(1) as $h)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)"><a href="/home?category={{ $h->category->slug }}" class="text-white text-decoration-none">{{ $h->category->name }}</a></div>
                @if ($h->image)
                    <img src="{{ asset('storage/' . $h->image) }}" alt="{{ $h->category->name }}" class="img-fluid">
                @else  
                    <img src="https://source.unsplash.com/500x400?{{ $h->category->name }}" class="card-img-top" alt="{{ $h->category->name }}">
                @endif
                <div class="card-body">
                  <h5 class="card-title"><a href="/home/{{ $h->slug }}" class="text-decoration-none">{{ $h->judul }}</h5>
                    <p>
                        <small class="text-muted">
                        By. <a href="/home?author={{ $h->user->username }}" class="text-decoration-none">{{ $h->user->name }}</a>{{ $h->created_at->diffForHumans() }}
                    </small>
                    </p>
                  <p class="card-text">{{ $h->excerpt }}</p>
                  <a href="/home/{{ $h->slug }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
        </div>
            
        @endforeach
    </div>
</div>

@else
<p class="test-center fs-4">No Post Found.</p>
@endif

<div class="d-flex justify-content-end">
  {{ $homed->links() }}
</div>

@endsection    

