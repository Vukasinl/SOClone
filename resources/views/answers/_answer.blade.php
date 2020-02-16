<div class="media post">

    @include('shared._vote', [
        'model' => $answer,
    ])
    <div class="media-body">
        {!! $answer->body_html !!}
        <div class="row">
            <div class="col-4">
                <div class="ml-auto">
                    @auth
                        @can('update', $answer)
                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-outline-info btn-sm">Edit</a>
                        @endcan

                        @if(Auth::user()->can('delete', $answer))
                            <form action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="post" class="form-delete">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
                <user-info :model="{{ $answer }}" label="Answered"></user-info>
            </div>
        </div>

    </div>
</div>
