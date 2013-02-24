<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Mirches</title>
	<meta name="viewport" content="width=device-width">
        {{ HTML::style('bootstrap/css/bootstrap.css') }}
        {{ HTML::style('bootstrap/css/bootstrap-responsive.css') }}
        {{ HTML::style('bootstrap/css/bootstrap-editable.css') }}
	{{ HTML::script('http://code.jquery.com/jquery-1.9.1.min.js') }}
        {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
        {{ HTML::script('bootstrap/js/bootstrap-editable.min.js') }}
        @foreach ($head['js'] as $script)
            {{ $script }}
        @endforeach
</head>
<body>
    <div class="container">
        @include('base.header')

        @yield('content')

        @include('base.footer')
    </div>
</body>