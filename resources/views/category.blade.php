<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('savePost') }}">
        @csrf

        <div class="post_form">
            <div>
                <div>Title</div>
                <div>
                    <input class="width100" name="title" value="">
                </div>
            </div>
    
            <div class="btn-wrapper">
                <button class="generate-btn">Create a category</button>
            </div>
        </div>
    </form>
</x-app-layout>