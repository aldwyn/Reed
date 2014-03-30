<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title></title>
</head>

<body>
  <?= anchor('profile/show', 'Back to Home'); ?>
  <h3><?= anchor('profile/peek/'.$question['user_id'], ucfirst($question['username'])); ?> asked...</h3>
	<h2>"<?= $question['content']; ?>"</h2>
  <?php
    if ($question['user_id'] == $user_id) {
      echo anchor('question/delete/'.$question['q_id'], 'Delete');
    } else {
      echo anchor('question/show/'.$question['q_id'], 'Follow');
    }
  ?>
  <em>Asked on <?= $question['date_asked']; ?></em>
	<div id="replyform">
    <?= form_open('reply/create'); ?>
    	<input type="hidden" name="q_id" value="<?= $question['q_id']; ?>">
    	<textarea name="reply" placeholder="Reply here..."></textarea><br/>
      <input type="submit" />
    <?= form_close(); ?>
  </div>
  <h3>Reply list:</h3>
  <div id="r_container">
  	<?php foreach ($replies as $reply) : ?>
      <div>
        <div><?= $reply['content']; ?></div>
        <?= anchor('#', 'Rate'); ?>   
        <em><?= anchor('profile/peek/'.$reply['user_id'], ucfirst($question['username'])); ?> replied on <?= $reply['reply_date']; ?></em>
        <br/><br/>
      </div>
	  <?php endforeach; ?>
</body>

</html>