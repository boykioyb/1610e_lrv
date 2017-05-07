<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/font/font-awesome.min.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/font/font.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/bootstrap.min.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/style.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/responsive.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('client-assets/css/jquery.bxslider.css')}}" media="screen" />
</head>
<body>
	
	@yield('content')
	
</body>
</html>