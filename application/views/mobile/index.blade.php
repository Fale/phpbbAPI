
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHPbbAPI v0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	{{ Asset::container('bootstrapper')->styles() }}
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">PHPbbAPI v0</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="..">All versions</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Functions</li>
              <li><a href="#forum">forum</a></li>
              <li><a href="#forum-x">forum/{x}</a></li>
              <li><a href="#">users</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <h2 id="forum">Forum</h2>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
          <hr class="bs-docs-separator">
          <h2 id="forum-x">Forum</h2>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
            <p>Here goes the text</p>
        </div><!--/span-->
      </div><!--/row-->
<?php phpinfo(); ?>
      <hr>

      <footer class="footer">
        <div class=container">
          <p>&copy; Fabio Alessandro Locati 2012-2013</p>
        </div>
      </footer>

    </div><!--/.fluid-container-->

    {{ Asset::container('bootstrapper')->scripts() }}
  </body>
</html>
