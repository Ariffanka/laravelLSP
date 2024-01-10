<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Penilaian Siswa</title>
</head>
<>
    
    @include('partials.header')

    <div class="menu">
        <a href="/" class="active">HOME</a>
    </div>

    <div class="kiri-atas">
        <fieldset>
            <center>
                <button onclick="tampilkan_login_admin()" class="button-primary">Admin</button>
                <button onclick="tampilkan_login_guru()" class="button-primary">Guru</button>
                <button onclick="tampilkan_login_siswa()" class="button-primary">Siswa</button>
                <hr>
                Pilih Login yang sesuai.
                <hr>
            </center>

    <div id="login_admin" class="container-login" style="display: none;">
        <center>
            <b>Login Admin</b>
            <p>{{ session('error') }}</p>
        </center>
        <form action="/login_admin" method="post">
            @csrf
            <table>
                <tr>
                    <td width="25%"><strong>Kode Admin</strong></td>
                    <td width="25%" style="text-align: right"><input type="text" name="kode_admin" maxlength="10" required></td>
                </tr>
                <tr>
                    <td width="25%"><strong>Password</strong></td>
                    <td width="25%" style="text-align: right"><input type="password" name="password" maxlength="10" required></td>
                </tr>
            </table>
            <button class="button-submit" name="button" type="submit">Login</button>
        </form>
    </div>

    <div id="login_guru" class="container-login" style="display: none;">
        <center>
            <b>Login Guru</b>
            <p>{{ session('error') }}</p>
        </center>
        <form action="/login_guru" method="post">
            @csrf
            <table>
                <tr>
                    <td width="25%"><strong>NIP</strong></td>
                    <td width="25%" style="text-align: right"><input type="text" name="nip" maxlength="10" required></td>
                </tr>
                <tr>
                    <td width="25%"><strong>Password</strong></td>
                    <td width="25%" style="text-align: right"><input type="password" name="password" maxlength="10" required></td>
                </tr>
            </table>
            <button class="button-submit" name="button" type="submit">Login</button>
        </form>
    </div>

    <div id="login_siswa" class="container-login" style="display: none;">
        <center>
            <b>Login Siswa</b>
            <p>{{ session('error') }}</p>
        </center>
        <form action="/login_siswa" method="post">
            @csrf
            <table>
                <tr>
                    <td width="25%"><strong>NIS</strong></td>
                    <td width="25%" style="text-align: right"><input type="text" name="nis" maxlength="10" required></td>
                </tr>
                <tr>
                    <td width="25%"><strong>Password</strong></td>
                    <td width="25%" style="text-align: right"><input type="password" name="password" maxlength="10" required></td>
                </tr>
            </table>
            <button class="button-submit" name="button" type="submit">Login</button>
        </form>
    </div>
    </fieldset>
</div>


    <div class="kanan">
        <center>
            <h1>
            SELAMAT DATANG    
                <br>
            Di Website Penilaian SMKN 1 Cibinong
            </h1>
        </center>
    </div>

    <div class="kiri-bawah">
        <center>
            <b>
                <p class="mar">Gallery</p>
                <div class="gallery">
                    <img src="{{asset('img/g2.jpeg')}}" alt="">
                </div>
            </b>
        </center>
    </div>

    @include('partials.footer')

    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>