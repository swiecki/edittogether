<?php debug($recentEssays); 
debug($recentRevisions);
debug($userInfo);
?>
<?php print($userInfo['User']['points']) ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>EditTogether</title>
<link rel="stylesheet" href="css/minimized/reset.css" />
<link rel="stylesheet" href="css/minimized/text.css" />
<link rel="stylesheet" href="css/minimized/style.css" />
<link rel="stylesheet" href="css/minimized/960_24_col.css" />
</head>
<body>
<div class="container_24">
<header id="masthead">
<div id="branding" class="grid_6"><h1>Edit Together</h1><p class="versionnumber">v0.1</p></div>
<div id="navigation" class="grid_7 prefix_11">
	<ul id="mainnav">
		<li>Welcome, <span class="username"><?php print($userInfo['User']['username']) ?></span>!</li>
		<li class="current"><a href="#">Your Dashboard</a></li>
		<li><a href="#">Logout</a></li>
	</ul>
</div>
</header>
<div class="clear"></div>
<section id="upperpanels">
<div id="youressays" class="grid_9">
	<h2><?php echo $this->Html->link(__('_Your Essays', true), array('controller' => 'essays', 'action' => 'index')); ?></h2>
	<div class="panelcontent">
	<ul>

	<?php
	$i = 0;
	foreach ($recentEssays as $essay):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="alternate"';
		}
	?>

	<li<?php echo $class;?>><p><span class="title"><?php echo $essay['Essay']['name']; ?></span> <span class="wordcount">352 words</span></p>  <div class="button"><?php echo $this->Html->link(__('count', true), array('controller' => 'essays', 'action' => 'index'), array('class' => 'numrevisions')); ?></div></li>
<?php endforeach; ?>


		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>
		<li class="alternate"><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>
	</ul>
	</div>
</div>                              
<div id="yourpoints" class="grid_6">
	<h2>_Your Points</h2>
	<div class="panelcontent">
	<p>You currently have <span class="numpoints"><?php print($userInfo['User']['points']) ?></span> points for use on posting your own essays.</p>
	<br/><p>This means you can post a total of <span class="numpoints"><?php print(floor ($userInfo['User']['points'] / 5)) ?></span> more essay.</p>
	<div class="meter">
		<span style="width: 70%"></span>
	</div>
	<p class="meterlabel"><span class="lowerbound">0</span><span class="mid">1</span><span class="upperbound">2</span></p>
	</div>
</div>
<div id="yourrevisions" class="grid_9">
	<h2><?php echo $this->Html->link(__('_Your Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?></h2>
	<div class="panelcontent">
	<ul>
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
		<li class="alternate"><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
	</ul>
	</div>
</div>
</section>
<div class="clear"></div>
<section id="lowerpanels">
<div id="postessay" class="grid_9">
	<h2>_Post Another Essay</h2>
	<div class="panelcontent">
	<div class="bigbutton"><a href="#" class="post">Add Essay</a></div>
	<p>Use the button above to go to the essay post screen.</p>
	</div>
</div>
<div id="getmorepoints" class="grid_6">
	<h2>_Get More Points</h2>
	<div class="panelcontent">
	<p>To get more points, post high-quality revisions on other peoples' essays.</p>
	<p>Immediately upon posting a revision, you will gain <span class="pointsgreen">5 points</span>.</p>
	<p>When the poster of the essay reviews your revision, they will be able to rate it 0 to 3 stars. 0 stars will lead to a subtraction of <span class="pointsgreen">5 points</span>. Positive stars award <span class="pointsgreen">2 points</span> per star.
</p>
	<p>Trying to "game the system" in any way will get your points reset and possibly your account banned.</p>
	</div>
</div>
<div id="postrevisions" class="grid_9">
	<h2>_Revise More Essays</h2>
	<div class="panelcontent">
	<div class="bigbutton"><a href="#" class="revise">Browse Unrevised Essays</a></div>
	<p>Use the button above to go to the essay revisions screen.</p>
	</div>
</div>
</section>
<div class="clear"></div>
</div>
</body>
</html>