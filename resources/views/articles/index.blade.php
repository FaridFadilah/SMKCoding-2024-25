@extends("layouts.app")

@section("content")
    <div class="container my-4">
        <div class="d-flex justify-content-between mb-4">
            <h4>Halaman list article</h4>
            <a href="{{ route("articles.create") }}" class="btn btn-primary"> Tambah artikel </a>
        </div>

        @foreach ($data as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $item["title"] }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item["category"] }}</h6>
                <p class="card-text">{{ $item["content"] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
