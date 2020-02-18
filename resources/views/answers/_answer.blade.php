<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">

        @include('shared._vote', [
            'model' => $answer,
        ])
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea v-model="body" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button type="button" @click="cancel" class="btn btn-outline-secondary">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            @auth
                                @can('update', $answer)
                                    <a @click.prevent="edit" class="btn btn-outline-info btn-sm">Edit</a>
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
    </div>
</answer>
