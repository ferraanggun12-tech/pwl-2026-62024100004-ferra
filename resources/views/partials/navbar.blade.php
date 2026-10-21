<div style="width: 220px; background-color: #343a40; min-height: 100vh; color: #fff; padding: 15px 0;">
    <!-- Judul / Logo Aplikasi -->
    <div style="padding: 0 15px 15px 15px; border-bottom: 1px solid #4b545c; margin-bottom: 15px; font-weight: bold; font-size: 16px;">
        Sistem Informasi Klinik
    </div>

    <!-- Menu Navigasi Berjejer ke Bawah -->
    <nav style="display: flex; flex-direction: column;">
        <a href="{{ route('dashboard') }}" 
           style="color: #668cd3; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dashboard*') ? 'background-color: #007bff; color: #fff;' : '' }}">
           Dashboard
        </a>
        <a href="{{ route('pasien.index') }}" 
           style="color: #668cd3; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('pasien*') ? 'background-color: #007bff; color: #fff;' : '' }}">
           Pasien
        </a>
        <a href="{{ route('dokter.index') }}" 
           style="color: #668cd3; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('dokter*') ? 'background-color: #007bff; color: #fff;' : '' }}">
           Dokter
        </a>
        <a href="{{ route('poli.index') }}" 
           style="color: #668cd3; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('poli*') ? 'background-color: #007bff; color: #fff;' : '' }}">
           Poli
        </a>
        <a href="{{ route('registrasi.index') }}" 
           style="color: #668cd3; text-decoration: none; padding: 10px 20px; display: block; {{ Request::is('pendaftaran*') ? 'background-color: #007bff; color: #fff;' : '' }}">
           Pendaftaran
        </a>
    </nav>
</div>