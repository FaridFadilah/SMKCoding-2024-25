@extends("layouts.app")

@section("content")
        <div class="card p-4">
                {{-- @dd($data) --}}
                <h3 class="">{{ $data["title"] }}</h3>
                <p>{{ $data["category"] }}</p>
                <article>
                        {{ $data["content"] }}
                </article>

                <img src="{{ $data["cover"] }}" alt="">
        </div>
@endsection