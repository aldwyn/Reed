<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title></title>
</head>

<body>
	<?php
    if ($sess_user != $user['user_id']) {
      echo anchor('profile/show', 'Back to Home');
    }
  ?>
  <?= anchor('session/logout', 'Sign-Out'); ?>
  <h2><?= ucfirst($user['username']); ?>'s Reed</h2>
	<div id="askform">
    <?= form_open('question/create'); ?>
    	<textarea name="question" placeholder="Question here..."></textarea><br/>
      <input type="text" name="tags" placeholder="Tags (comma-separated)" /><br/>
      <input type="submit" />
    <?= form_close(); ?>
  </div>
  <h3>Question list:</h3>
  <div id="q_container">
  	<?php foreach ($questions as $question) : ?>
	  	<div title="<?= ellipsize($question['content'], 32, .5); ?>">
        <?= anchor('question/show/'.$question['q_id'], $question['content']); ?>
      </div>
	  <?php endforeach; ?>
  </div>
</body>

</html>