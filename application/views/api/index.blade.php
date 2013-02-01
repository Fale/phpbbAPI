<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>API</title>
	<meta name="viewport" content="width=device-width">
	{{ Asset::container('bootstrapper')->styles() }}
    {{ Asset::container('bootstrapper')->scripts() }}
</head>
<body>
	<div class="container">
		<header>
			<h1>PHPbbAPI</h1>
		</header>
		<div role="main" class="main">
			<div class="home">
				<h2>Versions</h2>
                <p>At the moment the following API versions are availabe:</p>
                <ul>
                    <li><a href="v0/">Version 0</a></li>
                </ul>
			</div>
		</div>
	</div>
</body>
</html>
