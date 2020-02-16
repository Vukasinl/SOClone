<div class="media post">
    <div class="d-flex flex-column counters">
        <div class="vote">
            <strong>{{ $question->votes_count }}</strong> {{  \Illuminate\Support\Str::plural('vote', $question->votes_count) }}
        </div>
        <div class="status {{ $question->status }}">
            <strong>{{ $question->answers_count }}</strong> {{  \Illuminate\Support\Str::plural('answer', $question->answers_count) }}
        </div>
        <div class="view">
            {{ $question->views . " " . \Illuminate\Support\Str::plural('view', $question->views) }}
        </div>
    </div>
    <div class="media-body">
        <div class="d-flex align-items-center">
            <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
            <div class="ml-auto">
                @auth
                    @can('update', $question)
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                    @endcan

                    @if(Auth::user()->can('delete', $question))
                        <form action="{{ route('questions.destroy', $question->id) }}" method="post" class="form-delete">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>

        <p class="lead">
            Asked by
            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        <div class="excerpt">
            {{ $question->excerpt }}
        </div>

    </div>
</div>
