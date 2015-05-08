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
    <link rel="stylesheet" href="style/share.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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

        <div>
            <a href="http://twitter.com/share?url=https://github.com/uninspird/minilog&via=Abhirup Manna" target="_blank" class="share-btn twitter">
            <i class="fa fa-twitter"></i>
        </a>

        <!-- Google Plus -->
        <a href="https://plus.google.com/share?url=https://github.com/uninspird/minilog" target="_blank" class="share-btn google-plus">
            <i class="fa fa-google-plus"></i>
        </a>

        <!-- Facebook -->
        <a href="http://www.facebook.com/sharer/sharer.php?u=https://github.com/uninspird/minilog" target="_blank" class="share-btn facebook">
            <i class="fa fa-facebook"></i>
        </a>
    </div>

        <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES * * */
                var disqus_shortname = 'miniblog2';
        
                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
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