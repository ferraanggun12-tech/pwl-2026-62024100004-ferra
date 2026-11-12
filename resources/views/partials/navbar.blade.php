<div style="width: 250px; background-color: #343a40; min-height: 100vh; color: #fff; padding: 20px 0; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
        <!-- Judul / Logo Aplikasi -->
        <div style="padding: 0 20px 15px 20px; border-bottom: 1px solid #4b545c; margin-bottom: 15px; font-weight: bold; font-size: 18px;">
            Sistem Informasi Klinik
        </div>

        <!-- Menu Navigasi Berjejer ke Bawah -->
        <nav style="display: flex; flex-direction: column;">
            <a href="{{ route('dashboard') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dashboard*') ? 'background-color: #007bff;' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('pasien.index') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('pasien*') ? 'background-color: #007bff;' : '' }}">
                Pasien
            </a>
            <a href="{{ route('dokter.index') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dokter*') ? 'background-color: #007bff;' : '' }}">
                Dokter
            </a>
            <a href="{{ route('poli.index') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('poli*') ? 'background-color: #007bff;' : '' }}">
                Poli
            </a>
            <a href="{{ route('registrasi.index') }}" 
               style="color: #fff; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('registrasi*') ? 'background-color: #007bff;' : '' }}">
                Pendaftaran
            </a>
        </nav>
    </div>

    <!-- Bagian Identitas User dan Autentikasi di Bagian Bawah Sidebar -->
    <div style="border-top: 1px solid #4b545c; padding: 15px 20px;">
        @auth
            <p style="margin-bottom: 10px; font-size: 14px;">Halo, <strong>{{ Auth::user()->name }}</strong></p>
            
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