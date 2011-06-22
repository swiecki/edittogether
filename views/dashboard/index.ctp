<?/*php debug($recentEssays); 
debug($recentRevisions);
debug($userInfo);
*/?>
<?php  

// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.

function myTruncate2($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  $string = substr($string, 0, $limit);
  if(false !== ($breakpoint = strrpos($string, $break))) {
    $string = substr($string, 0, $breakpoint);
  }

  return $string . $pad;
}

?>
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
		<li class="current"><?php echo $this->Html->link(__('Your Dashboard', true), array('controller' => 'dashboard', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout')); ?></li>
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
/*
	This next sequence is an if statement that checks if the $recentEssays array is empty. 
	If it is not empty, it does a for loop where it generates list items based on recentEssays.
	If it is empty, it generates a dummy item that informs the user they have no essays.
*/
 ?>

<?php if(!empty($recentEssays)): ?>  

<?php
	$i = 1; //this is set to 1 so the stripe alternation starts on the second bar.
	foreach ($recentEssays as $essay):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="alternate"';
		}
	?>

	<li<?php echo $class;?>><p><span class="title"><?php echo myTruncate2($essay['Essay']['name'], 20, $break=" ", $pad="..."); ?></span> <span class="wordcount">352 words</span></p>  <div class="button">
<?php 
/*
	This writes number of revisions. x revisions or x revision depending on whether its singular or plural.
*/
?>
	<?php
	if ($essay['Essay']['revision_count'] == 1) {
	  echo $this->Html->link(__($essay['Essay']['revision_count'].' revision', true), array('controller' => 'essays', 'action' => 'index'), array('class' => 'numrevisions'));
	} else {
 	 echo $this->Html->link(__($essay['Essay']['revision_count'].' revisions', true), array('controller' => 'essays', 'action' => 'index'), array('class' => 'numrevisions'));
	}
?>


	</div></li>
<?php endforeach; ?>

<?php else: ?>
<li><p>You currently have no essays. If you have the points for it, click the button below to post one!</p></li>
<?php endif; ?>	

	



		<!--			TO BE REMOVED
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>
		<li class="alternate"><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="numrevisions">0 revisions</a></div></li>-->
	</ul>
	</div>
</div>                              
<div id="yourpoints" class="grid_6">
	<h2>_Your Points</h2>
	<div class="panelcontent">
	<p>You currently have <span class="numpoints"><?php print($userInfo['User']['points']) ?></span> points for use on posting your own essays.</p>
	<br/><p>This means you can post a total of <span class="numpoints"><?php print(floor ($userInfo['User']['points'] / 5)) ?></span> more essay<?php if(floor ($userInfo['User']['points'] / 5) != 1) echo 's' ?>.</p>
	<?php 
	//Meter calculations go here
	$userpoints = $userInfo['User']['points'];
	$lowerbound = floor($userpoints/5);
	$width = (($userpoints % 5) / 5) *100;
	$upperbound = ceil($userpoints/5);
	if($upperbound == 0){
		$upperbound = 1;
	}
	?>
	<div class="meter">
		<span style="width: <?php echo $width ?>%"></span>
	</div>
	<p class="meterlabel"><span class="lowerbound"><?php echo $lowerbound ?></span><span class="mid">progress to next essay</span><span class="upperbound"><?php echo $upperbound ?></span></p>
	</div>
</div>
<div id="yourrevisions" class="grid_9">
	<h2><?php echo $this->Html->link(__('_Your Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?></h2>
	<div class="panelcontent">
	<ul>

<?php
/*
	This next sequence is an if statement that checks if the $recentEssays array is empty. 
	If it is not empty, it does a for loop where it generates list items based on recentEssays.
	If it is empty, it generates a dummy item that informs the user they have no essays.
*/
 ?>

<?php if(!empty($recentRevisions)): ?>  

<?php
	$i = 1; //this is set to 1 so the stripe alternation starts on the second bar.
	foreach ($recentRevisions as $revision):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="alternate"';
		}
	?>

	<li<?php echo $class;?>><p><span class="title"><?php echo myTruncate2($revision['Revision']['title'], 20, $break=" ", $pad="..."); ?></span> <span class="wordcount">352 words</span></p>  <div class="button">
	<?php echo $this->Html->link(__('view revision', true), array('controller' => 'revisions', 'action' => 'view', $revision['Revision']['id']), array('class' => 'viewrevision'));?>
	</div></li>
<?php endforeach; ?>

<?php else: ?>
<li><p>You currently have no revisions. Click the button below to find an essay to revise!</p></li>
<?php endif; ?>	



<!--	TO BE REMOVED
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
		<li class="alternate"><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
		<li><p><span class="title">Test Essay 1</span> <span class="wordcount">352 words</span></p>  <div class="button"><a href="#" class="viewrevision">view revision</a></div></li>
-->	

	</ul>
	</div>
</div>
</section>
<div class="clear"></div>
<section id="lowerpanels">
<div id="postessay" class="grid_9">
	<h2>_Post Another Essay</h2>
	<div class="panelcontent">
	<div class="bigbutton"><?php echo $this->Html->link(__('Add Essay', true), array('controller' => 'essays', 'action' => 'add'), array('class' => 'post'));?></div>
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
	<div class="bigbutton"><?php echo $this->Html->link(__('Browse Unrevised Essays', true), array('controller' => 'revisions', 'action' => 'index'), array('class' => 'revise'));?></div>
	<p>Use the button above to go to the essay revisions screen.</p>
	</div>
</div>
</section>
<div class="clear"></div>
</div>
</body>
</html>