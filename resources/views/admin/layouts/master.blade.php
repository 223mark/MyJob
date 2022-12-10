<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyJOB</title>
    <link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- bootsrtap link need js --}}
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- Fontawesone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />
</head>
<style>
    #side-bar h5:hover {
        color: orange;
        cursor: pointer;
        user-select: none;
    }
</style>

<body style="">
    <header id="header">
        <div class="brand">
            <h2 class="d-inline text-secondary">My JOB</h2>
            <span class="d-inline">.com.mm</span>
        </div>
        {{-- {{ Auth::user()->name }} --}}
        <nav class="nav-bar">
            <a href="{{ route('admin#employerList') }}"><span>Employer List</span></a>
            <a href="{{ route('admin#userList') }}"><span>User List</span></a>
            <a href="{{ route('admin#profile') }}"><span>Profile</span></a>
            {{-- <a href="{{ route('admin#jobListPage') }}"> <span>Job List</span></a> --}}
            {{-- <a href="{{ route('admin#blogPage') }}"> <span>Blog</span></a> --}}


            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="btn bg-dark text-white ml-3" value="Logout">
            </form>

        </nav>
    </header>
    @yield('content')

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>
