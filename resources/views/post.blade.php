<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('savePost') }}">
        @csrf

        <div class="post_form">
            @if (isset($status) && $status == 'error')
                <div>Create post failed</div>
            @endif
            @if (isset($status) && $status == 'success')
                <div>Create post success</div>
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
                    <select class="width100">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div>
                <div style="margin-top: 10px;">Content</div>
                <div>
                    <input class="width100" name="content"> 
                </div>
            </div>
            <div class="btn-wrapper">
                <button class="generate-btn">Create a post</button>
            </div>
        </div>
    </form>
</x-app-layout>