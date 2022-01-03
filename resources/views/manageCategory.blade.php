<x-app-layout>
    <x-slot name="header">
    </x-slot>

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
        @if (Session::has('deleteStatus') && session('deleteStatus') == 'error')
        <div class="alert alert-danger">Delete category failed</div>
        @endif

        @if (Session::has('deleteStatus') && session('deleteStatus') == 'success')
        <div class="alert alert-success">Delete category success</div>
        @endif
        <div>
            <table style="width: 100%;">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($categoryList as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td class="text-center">
                        <form method="GET" action="{{ route('editCategory', $category->id) }}">
                            <button type="submit" class="generate-btn width60">Edit Category</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('deleteCategory', $category->id) }}">
                            @csrf
                            <button type="submit" class="generate-btn width60">Delete Category</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>