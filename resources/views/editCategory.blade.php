<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('updateCategory', $category->id) }}">
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
            <div class="alert alert-danger">Edit category failed</div>
            @endif
            
            @if (isset($status) && $status == 'success')
            <div class="alert alert-success">Edit category success</div>
            @endif
            <div>
                <div>Title</div>
                <div>
                    <input class="width100" name="title" value="{{ $category->title }}">
                </div>
            </div>

            <div class="btn-wrapper">
                <button class="generate-btn">Update Category</button>
            </div>
        </div>
    </form>
</x-app-layout>