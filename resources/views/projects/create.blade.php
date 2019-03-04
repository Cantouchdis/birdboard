@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create a project</h1>
            <form method="POST" action="/projects">
                @csrf
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
                <button type="submit">Create Project</button>
                <a href="/projects">Cancel</a>
            </form>
</div>
@endsection