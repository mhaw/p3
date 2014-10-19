
<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Mike&#39;s Dev Toolkit')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='/css/style.css' type='text/css'>

	@yield('head')

	
</head>
<body>

	<h3>Mike's Dev ToolKit</h3>

	@yield('intro')
	
	@yield('lorem')

	@yield('users')

	@yield('pass')

	@yield('body')
	
</body>
</html>