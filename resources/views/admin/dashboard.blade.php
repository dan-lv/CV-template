<div>
    <table style="width: 100%;">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Template</th>
            <th>Action</th>
        </tr>
        @foreach ($userList as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('userCv', [$user->id, 1]) }}">{{ route('userCv', [$user->id, 1]) }}</a>
            </td>
            <td class="text-center">
                <form method="POST" action="{{ route('deleteUser', $user->id) }}">
                    @csrf
                    <button type="submit" class="generate-btn width60">Delete User</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
