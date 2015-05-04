<?php require('includes/config.php'); 

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/blog.css">
    <link rel="stylesheet" href="style/pure/pure-min.css">
    <link rel="stylesheet" href="style/pure/grids-responsive-min.css">
</head>
<body>

	<div id="layout" class="pure-g">
    <div class="sidebar pure-u-1 pure-u-md-1-4">
        <div class="header">
            <h1 class="brand-title">MiniLog</h1>
            <h2 class="brand-tagline">- a minimal blog ...</h2>
            <a href="./">return home</a>
        </div>
    </div>
    <div class="content pure-u-1 pure-u-md-3-4">
        <div>
		<?php	
			echo '<div class="posts">
        			<section class="post">';
				echo '<h2 class="post-title">'.$row['postTitle'].'</h2>';
				echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
				echo '<p>'.$row['postCont'].'</p>';				
			echo '</section>
            		</div>';
		?>

		<div class="footer">
        		<div class="pure-menu pure-menu-horizontal">
            		<ul>
                		<li class="pure-menu-item"><a href="#" class="pure-menu-link">About</a></li>
                		<li class="pure-menu-item"><a href="http://twitter.com/#" class="pure-menu-link">Twitter</a></li>
                		<li class="pure-menu-item"><a href="http://github.com/#" class="pure-menu-link">GitHub</a></li>
            		</ul>
        		</div>
    		</div>
    	</div>
	</div>


</body>
</html>