<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.tambah') }}" method="post">
            @csrf
            <input type="hidden" name="id">

            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    <div class="input-group-text">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                    <div class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Tambahan Input Password -->
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
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
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">Super Admin</option>
                    </select>
                </div>
                @error('role') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</div>
