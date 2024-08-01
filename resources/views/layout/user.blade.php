<h1>Hồ sơ</h1>
<form method="POST" action="{{ route('profile') }}">
    @csrf
    <input type="text" name="fullname" value="{{ $user->fullname }}" required>
    <input type="text" name="username" value="{{ $user->username }}" required>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <button type="submit">Cập nhật hồ sơ</button>
</form>

<h2>Thay đổi mật khẩu</h2>
<form method="POST" action="{{ route('changePassword') }}">
    @csrf
    <input type="password" name="current_password" placeholder="Current Password" required>
    <input type="password" name="new_password" placeholder="New Password" required>
    <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" required>
    <button type="submit">Thay đổi mật khẩu</button>
</form>
