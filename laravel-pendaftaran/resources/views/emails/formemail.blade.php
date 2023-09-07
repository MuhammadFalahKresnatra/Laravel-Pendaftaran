<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('Pendaftaran', 'Pendaftaran') }}</title>

  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Favicon -->
  <link href="{{ asset('img/logo_hexa.png') }}" rel="icon" type="image/png">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style>
    body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
    }
    .contact-form{
        background: #fff;
        margin-top: 10%;
        margin-bottom: 5%;
        width: 70%;
    }
    .contact-form .form-control{
        border-radius:1rem;
    }
    .contact-image{
        text-align: center;
    }
    .contact-image img{
        border-radius: 1rem;
        width: 11%;
        margin-top: -3%;
    }
    .contact-form form{
        padding: 14%;
    }
    .contact-form form .row{
        margin-bottom: -7%;
    }
    .contact-form h3{
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
    }
    .contact-form .btnContact {
        width: 50%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #dc3545;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }
    .btnContactSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container contact-form rounded-lg">
    <div class="contact-image">
        <img src="data:image/png;base64,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" alt="rocket_contact"/>
    </div>
    <form method="post" action="{{ route('email.kirim') }}">
      @csrf
        <h3 class="text-uppercase">Pendaftaran</h3>
          <div class="row">
            <div class="col">
                @if (session('message'))
                  <div class="alert alert-success ">
                      {{ session('message') }}
                  </div>
                @endif
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" >
                  @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Alamat Email Saya</label>
                  <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </div>
    </form>
  </div>

  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>