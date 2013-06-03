<?php

  include('inc_config.php');
  include("inc_rss.php");

  function get_date() {
    if (isset($_POST['d']))
      return $_POST['d'];
    if (isset($_GET['d']))
      return $_GET['d'];
    else
      return date("Ymd");
  }

  function select_post() {
    $d = get_date();
    $db = new PDO(DBCONNECT, DBUSER, DBPASS);
    $sql = 'select body from posts where stamp=?';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$d);
    $stmt->execute();
    if ($row = $stmt->fetch()) $body = $row['body'];
    $stmt = null;
    $db = null;
    if (isset($body)) return $body;
    else return "";
  }

  function insert_post() {
    if (isset($_POST['body'])) {
      $d = get_date();
      $db = new PDO(DBCONNECT, DBUSER, DBPASS);
      $sql = 'insert into posts(stamp,body) values(?,?);';
      $stmt = $db->prepare($sql);
      $stmt->bindParam(1,$d);
      $stmt->bindParam(2,$_POST['body']);
      $stmt->execute();
      create_rss();
      $stmt = null;
      $db = null;
    }
  }

  function update_post() {
    if (isset($_POST['body'])) {
      $d = get_date();
      $db = new PDO(DBCONNECT, DBUSER, DBPASS);
      $sql = 'update posts set body=? where stamp=?;';
      $stmt = $db->prepare($sql);
      $stmt->bindParam(1,$_POST['body']);
      $stmt->bindParam(2,$d);
      $stmt->execute();
      create_rss();
      $stmt = null;
      $db = null;
    }
  }

  if (isset($_POST['d'])) update_post();
  else insert_post();

?><html>
<head>
  <title>Nano Blog</title>
</head>
<body>
  <?php $body = select_post(); ?>
  <p>I'm not your mother.  Write your own HTML.  Use ?d=yyyymmdd for editing.</p>
  <form method="post">
  <?php
    if ($body != "") {
      if (isset($_GET['d']))
        echo "<input type=\"hidden\" name=\"d\" value=\"" . $_GET['d'] . "\" />\n";
      else
        echo "<input type=\"hidden\" name=\"d\" value=\"" . date("Ymd") . "\" />\n";
    }
  ?>
    <textarea name="body" cols="80" rows="24"><?php echo $body; ?></textarea><br />
    <input type="submit" value="post" />
  </form>
</body>
</html>
