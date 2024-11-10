<form action="{{ route('umum.register') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="nama_customer" placeholder="Nama Customer" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="no_hp" placeholder="No. Hp" required>
    <button type="submit">Register</button>
</form>
