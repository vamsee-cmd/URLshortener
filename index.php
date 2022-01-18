<?php 
$conn = new mysqli('remotemysql.com', 'WK1eggxcgK', 'Q7gkaeCv2k', 'WK1eggxcgK');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result=$conn->query("select * from urls order by c DESC");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>URL Shortener</title>

	<link rel="stylesheet" href="main.css" />
	<script>
		function myFunc(){
			var lurl=document.getElementById("long_url").value.trim();
			var pattern = /^((http|https|ftp):\/\/)/;
			if(!pattern.test(lurl)) {
			document.getElementById("long_url").value = "http://" + lurl;
}
return true;
		}
		function stoppreloader(){
            var preloader=document.getElementById('loading').style.display="none";
          }
		  
	</script>
	<script src="https://kit.fontawesome.com/375e6da240.js" crossorigin="anonymous"></script>
	<script>
		function copyLink(surl){
			navigator.clipboard.writeText(surl);
		}
	</script>
</head>
<body onload="setTimeout(stoppreloader, 1500)">
<div id="loading"></div>
	<header>
		<h1>URL Shortener</h1>
	</header>
	<main>
		<section class="form">
			<form action="./add/index.php" onsubmit="return myFunc()" method="post">
				<input type="text" name="long_url" id="long_url" placeholder="e.g. https://example.com" />
				<input type="submit" value="SHORTEN" />
			</form>
		</section>

		<section class="urls">
			<?php while($url=$result->fetch_assoc()){ ?>
			<div class="url">
				<div class="short_url">
					<a href="./r?c=<?= $url['c']; ?>" target="_blank">
						q-k.herokuapp.com/r?c=<?= $url['c']; ?>
					</a><button onclick="copyLink('q-k.herokuapp.com/r?c=<?= $url['c']; ?>')"><i class="far fa-copy"></i></button>
				</div>
				<div class="long_url">
					<a href="<?= $url['longurl']; ?>" target="_blank"><?= $url['longurl']; ?></a>
				</div>
			</div>
			<?php } ?>
		</section>
	</main>
</body>
</html>