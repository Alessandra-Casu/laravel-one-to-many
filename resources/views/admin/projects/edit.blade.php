@extends('admin.layouts.base')

@section('contents')

    <h1>Edit project</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="post" action="{{ route('admin.projects.update', ['project' => $project]) }}" novalidate>
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title', $project->title) }}"
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" aria-label="Type" id="type" name="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                         @if (old('tpe_id',$project->type->id) == $type->id) selected     
                    @endif>{{ $type->name }}</option>
                @endforeach
            </select>
            
            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
       
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Category" id="category" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                         @if (old('category_id',$project->category->id) == $category->id) selected     
                    @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_image" class="form-label">Image url</label>
            <input
                type="url"
                class="form-control @error('url_image') is-invalid @enderror"
                id="url_image"
                name="url_image"
                value="{{ old('url_image', $project->url_image) }}"
            >
            @error('url_image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea
                class="form-control @error('content') is-invalid @enderror"
                id="content"
                rows="10"
                name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

@endsection