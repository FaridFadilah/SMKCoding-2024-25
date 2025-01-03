@extends("layouts.app")

@section("title") Tambah artikel @endsection
@section("content")
    <div class="container my-4">
        <div class="card p-4">
            <form enctype="multipart/form-data" action="{{ route("articles.store") }}" method="POST">
                @csrf
                <h1 class="mb-3">Tambah Artikel</h1>

                <div class="mb-3">
                    <label for="title">Judul article</label>
                    <input class="form-control" type="text" name="title" id="title">
                    @if($errors->has("content"))
                        <span class="text-danger">{{ $errors->first("content") }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" id="cover" class="form-control">
                    @if($errors->has("cover"))
                        <span class="text-danger">{{ $errors->first("cover") }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="content">Konten artikel</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                    @if($errors->has("content"))
                        <span class="text-danger">{{ $errors->first("content") }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" id="category">
                        <option value="#" disabled checked>Pilih category</option>
                        <option value="Programming">Programming</option>
                        <option value="Berita Terkini">Berita Terkini</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection