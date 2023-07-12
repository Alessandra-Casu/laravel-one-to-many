@extends('admin.layouts.base')

@section('contents')
   
    <h1>{{ $type->name }}</h1>
    

    <h2>Type Project: </h2>
    <ul>
        @foreach ($type->projects as $project)
            <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
        @endforeach
    </ul>

@endsection