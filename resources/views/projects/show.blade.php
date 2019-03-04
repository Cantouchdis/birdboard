@extends('layouts.app')
@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects" class="text-grey text-sm font-normal no-underline">
                    My Projects </a>/ {{ $project->title }}
            </p>
            <a href="/projects/create" class="button">New project</a>
        </div>
    </header>
    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-grey font-normal mb-3">Tasks</h2>

                    @foreach($project->tasks as $task)
                        <form method="POST" action="{{ $project->path() . '/tasks/' . $task->id }}">
                            @method('PATCH')
                            @csrf
                            <div class="card mb-3">
                                <div class="flex">
                                    <input name="body" value="{{$task->body}}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                                    <input name="completed" type="checkbox" value="{{$task->body}}" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </div>

                        </form>

                    @endforeach
                    <div class="card mb-3">
                        <form method="POST" action="{{ $project->path(). '/tasks' }}">
                            @csrf
                            <input name="body" placeholder="Add a new task..." class="w-full">
                        </form>
                    </div>
                </div>
                <div>
                    <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
                    <form action="{{ $project->path() }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <textarea
                            name="notes"
                            class="card w-full mb-4"
                            style="min-height: 200px;"
                            placeholder="Anything special that you want to make note of?"
                        >{{ $project->notes }}</textarea>

                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>
@endsection