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
                                    <button @click="destroy" class="btn btn-outline-danger btn-sm">Delete</button>
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
