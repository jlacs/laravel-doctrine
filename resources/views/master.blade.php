<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') :: ToDo List!</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
    </head>

    <body>
        <div class="container">
            <h1>ToDo List!</h1>
            <hr>

            @if(session('success_message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success_message') }}
                </div>
            @endif

            @yield('content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>