<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error</title>
	<style>
		*{
			padding: 0;
			margin: 0;
		}
		.container{
			position: absolute;
			display: flex;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 100%;
			justify-content: center;
			align-items: center;
			background-color: #333;
		}
		.grid{
			display: grid;
			width: 400px;
			height: 300px;
			background-color: #ddd;
			grid-template-rows: 50px calc(100% - 50px);
		}
		.grid div:nth-child(1){
			padding: 10px;
			background-color: silver;
		}
		.grid div:nth-child(2){
			padding: 10px;
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="grid">
			<div>Message</div>
			<div>
				<p>Halaman yang anda minta tidak tersedia</p>
			</div>
		</div>
	</div>
</body>
</html>