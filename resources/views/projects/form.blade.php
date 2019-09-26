@csrf
<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>
    <div class="control">
        <input
                type="text"
                class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                name="title"
                id="title"
                value="{{ $project->title }}"
                required>
    </div>
</div>
<div class="field mb-6">
    <div class="control">
        <input type="radio" name="gender" value="male"> Individual Project<br>
        <input type="radio" name="gender" value="female"> Group Project<br>
    </div>
</div>
<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="description">Description</label>
    <textarea name="description"
              rows="10"
              class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
              placeholder="I should start learning piano."
              id="description"
              required>{{ $project->description }}</textarea>
</div>
<div class="field">
    <div class="control">
        <button class="button is-link mr-2" type="submit">{{ $buttonText }}</button>
        <a href="/projects">Cancel</a>
    </div>
</div>

@if($errors->any())
    <div class="field mt-6">
        @foreach($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
