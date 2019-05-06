<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo isset($title) ? $title : ""; ?></title>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->css("bootstrap.min.css") ?>
</head>
<body>

<div class="container" style="margin-top:30px;">
  <?= $this->Flash->render() ?>
  <?= $this->fetch("content")?>
</div>

</body>
</html>
