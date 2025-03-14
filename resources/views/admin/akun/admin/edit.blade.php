<div class="row">
    <div class="col-lg-12">
        <form action="{{ url('/admin/admin/edit', $akun->id_admin) }}" method="post">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" value="{{ $akun->username }}" required>
                    <div class="input-group-text">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" value="{{ $akun->email }}" required>
                    <div class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Tambahan Input Password -->
            <div class="form-group">
                <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control">
                    <div class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </div>
                </div>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Perbaikan Input Role -->
            <div class="form-group">
                <label>Role</label>
                <div class="input-group">
                    <select name="role" class="form-control" required>
                        <option value="Admin" {{ $akun->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Super Admin" {{ $akun->role == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>
                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
