<div style="width: 250px; background-color: #343a40; min-height: 100vh; color: #fff; padding: 20px 0; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
        <!-- Judul / Logo Aplikasi -->
        <div style="padding: 0 20px 15px 20px; border-bottom: 1px solid #4b545c; margin-bottom: 15px; font-weight: bold; font-size: 18px;">
            Sistem Informasi Klinik
        </div>

        <!-- Menu Navigasi Berjejer ke Bawah dengan Pembatasan Role -->
        <nav style="display: flex; flex-direction: column;">
            <!-- Dashboard dapat diakses semua user yang login -->
            <a href="{{ route('dashboard') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dashboard*') ? 'background-color: #007bff;' : '' }}">
                Dashboard
            </a>

            @auth
                <!-- Menu Manajemen User (Hanya untuk Admin) -->
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('users.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('users*') ? 'background-color: #007bff;' : '' }}">
                        Manajemen User
                    </a>
                @endif

                <!-- Menu Data Pasien & Pendaftaran (Untuk Admin dan Petugas Pendaftaran) -->
                @if (in_array(Auth::user()->role, ['admin', 'registration']))
                    <a href="{{ route('pasien.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('pasien*') ? 'background-color: #007bff;' : '' }}">
                        Pasien
                    </a>
                    <a href="{{ route('registrasi.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('registrasi*') ? 'background-color: #007bff;' : '' }}">
                        Pendaftaran
                    </a>
                @endif

                <!-- Menu Pemeriksaan Pasien (Khusus untuk Dokter) -->
                @if (Auth::user()->role === 'doctor')
                    <a href="{{ route('pemeriksaan.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('pemeriksaan*') ? 'background-color: #007bff;' : '' }}">
                        Pemeriksaan Medis
                    </a>
                @endif

                <!-- Menu Dokter & Poli (Hanya untuk Admin) -->
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('dokter.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dokter*') ? 'background-color: #007bff;' : '' }}">
                        Dokter
                    </a>
                    <a href="{{ route('poli.index') }}" 
                       style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('poli*') ? 'background-color: #007bff;' : '' }}">
                        Poli
                    </a>
                @endif
            @endauth
        </nav>
    </div>

    <!-- Bagian Identitas User (Menampilkan Nama & Role) dan Logout di Bagian Bawah -->
    <div style="border-top: 1px solid #4b545c; padding: 15px 20px;">
        @auth
            <div style="margin-bottom: 10px; font-size: 14px;">
                <p style="margin: 0;">Halo, <strong>{{ Auth::user()->name }}</strong></p>
                <span style="font-size: 12px; background-color: #495057; padding: 2px 6px; border-radius: 3px; display: inline-block; margin-top: 4px;">
                    Role: {{ ucfirst(Auth::user()->role) }}
                </span>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="width: 100%; padding: 8px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" style="display: block; text-align: center; padding: 8px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">Login</a>
        @endguest
    </div>
</div>