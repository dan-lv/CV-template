<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('savePost') }}">
        @csrf

        <div class="post_form">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (isset($status) && $status == 'error')
            <div class="alert-danger">Create post failed</div>
            @endif
            @if (isset($status) && $status == 'success')
            <div class="alert-success">Create post success</div>
            @endif
            <div>
                <div>Title</div>
                <div>
                    <input class="width100" name="title" value="">
                </div>
            </div>
            <div>
                <div style="margin-top: 10px;">Category</div>
                <div>
                    <select class="width100" name="category_id">
                        <option value=""></option>
                        @foreach ($categoryList as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <div style="margin-top: 10px;">Content</div>
                <div>
                    <textarea class="width100 ckeditor" name="content">{{ old('content') ?? '' }}</textarea>
                </div>
            </div>
            <div class="btn-wrapper">
                <button class="generate-btn">Create a post</button>
            </div>
        </div>
    </form>
</x-app-layout>