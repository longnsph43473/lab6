<h1>Quản lý người dùng</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->active ? 'Active' : 'Inactive' }}</td>
        <td>
            <form method="POST" action="{{ route('admin.toggleUserActive', $user->id) }}">
                @csrf
                <button type="submit">
                    {{ $user->active ? 'Deactivate' : 'Activate' }}
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
