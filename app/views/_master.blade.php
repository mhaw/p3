
<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Mike&#39;s Dev Toolkit')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='style/style.css' type='text/css'>

	@yield('head')

	
</head>
<body>

	    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://p3.mikehaw.me">Mike's Dev Toolkit</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://p1.mikehaw.me">P1</a></li>
            <li><a href="http://p2.mikehaw.me">P2</a></li>
            <li><a href="http://p3.mikehaw.me">P3</a></li>
            <li><a href="http://p4.mikehaw.me">P4</a></li>
            <li><a href="http://dwa15.com/">DWA15</a></li>
            <li><a href="https://github.com/mhaw/p3">P3 GibHub</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<!-- +++++ Welcome Section +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					@yield('content')
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->

	
	
	<!-- +++++ Footer Section +++++ -->
	
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<p>
						Made in<br/>
						Durham, NC<br/>

					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
					<h4>My Links</h4>
					<p>
						<a href="https://github.com/mhaw">GitHub</a><br/>
						<a href="https://twitter.com/guyfromva">Twitter</a><br/>
						<a href="http://www.linkedin.com/in/mikehaw/">LinkedIn</a>
					</p>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4">
				</div><!-- /col-lg-4 -->
			
			</div>
		
		</div>
	</div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
	
</body>
</html>