<?php
	//ini_set('display_errors', 1);
	require_once '../class/class.articles.php';

	// Include header
	require_once 'partials/header.php';
?>


<div class="container">
	<section class="row homepage">
		<div class="col-8">
			<div class="box">

				<article class="article">
					<h1 class="article__top-title">Top five posts</h1>
					
					<?php 
						$a = new Articles;
						$obj = $a->getData('../data.json');
						$articleObject = json_decode($obj);
						
						if($articleObject->error != false) {

							foreach($articleObject->articles as $article)
							{
								$title = $article->title;
								$desc = $article->description;
								$url = $article->url;
								$thumb = false;
								if(isset($article->thumbnail)) {
									$thumb = $article->thumbnail;
								}

						?>
							<div class="article__item">
								<?php if($thumb != false) { ?>
								<div class="article__thumb" style="background: url(<?php echo $thumb; ?>) #ddd no-repeat top center;background-size: cover;"></div>
								<?php } ?>
								<div class="article__text">
									<h3 class="article__title"><a href="<?php echo $url; ?>"><?php echo $title ?></a></h3>
									<p class="article__description">
										<?php echo $desc; ?>
									</p>
									<a href="<?php echo $url; ?>" class="btn">Read more</a>
								</div>
							</div>
						<?php
							}

						} else {

							echo "asd";

						}

					?>
				</article>
			</div>
		</div>
		<div class="col-4">
			<div class="box">
				<section>
					<h3 class="title">Image of the week</h3>
					<img src="images/familyguy.png" alt="Family Guy CSS">
					<a href="#" class="btn">See more</a>
				</section>
				<div class="separator"></div>
				<section>
					<h3 class="title">Quote of the week</h3>
					<blockquote>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						<footer><cite title="Author">- Johnny Five</cite></footer>
					</blockquote>
					<a href="#" class="btn">More qoutes</a>
				</section>
			</div>
		</div>
	</section>
</div>
		
<?php

	// Include Footer
	require_once 'partials/footer.php';