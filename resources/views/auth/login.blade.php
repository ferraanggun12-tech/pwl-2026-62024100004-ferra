<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Klinik</title>
</head>
<body style="background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="width: 100%; max-width: 400px; padding: 25px; background: white; border: 1px solid #ccc; border-radius: 6px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h2 style="margin-bottom: 20px; text-align: center;">Login Klinik</h2>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                @error('email') 
                    <div style="color: red; font-size: 12px; margin-top: 3px;">{{ $message }}</div> 
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" style="width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
                @error('password') 
                    <div style="color: red; font-size: 12px; margin-top: 3px;">{{ $message }}</div> 
                @enderror
            </div>

            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Login</button>
        </form>
    </div>
</body>
</html>