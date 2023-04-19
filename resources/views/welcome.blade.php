<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="#">Jo Group</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                        <a class="btn" href="{{ url('/home') }}">Home</a>
                        @else
                        <a class="btn" href="{{ route('login') }}">Login</a>

                        
                        @endauth
                    </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Nav -->



    <div class="flex-center position-ref full-height">
        <section id="intro">
            <div class="container text-center">
                <h1>Benvenuto</h1>
                <h3>Accedi o registrati per visualizzare le consultazione di anagrafiche</h3>

                <span><strong>Passaggi:</strong></span>
                <br>
                1. Scaricare repo;
                <br>
                2. Composer + npm;
                <br>
                3. DB .env: laravel_jogroup
                <br>
                4. php artisan migrate:fresh + db:seed
                <br>
                <br>
                <br>
                <p>
                    Accesso: admin@jogroup.it
                    <br>
                    Password: rootpassword
                </p>
            </div>
        </section>
        <!-- /#intro -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>