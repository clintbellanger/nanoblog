<?php

  include('inc_config.php');
  include('inc_discussion.php');

  function format_stamp($stamp) {
    echo substr($stamp,0,4);
    echo STAMPDELIM;
    echo substr($stamp,4,2);
    echo STAMPDELIM;
    echo substr($stamp,6,2);
  }

  function format_post($stamp, $body) {
    echo "<div class=\"" . CLASSNAME . "\">\n";
    echo "  <h3><a href=\"" . PERMALINK . $stamp . "\">";
    format_stamp($stamp);
    echo "</a></h3>\n";
    echo $body . "\n";
    echo "<p class=\"post_footer\"><a href=\"" . PERMALINK . $stamp . "\">Permalink</a>";

    if (DISQUS_SHORTNAME != "") {
      echo " | <a href=\"" . PERMALINK . $stamp . "#disqus_thread\">Comments</a>";
    };

    echo "</p>\n";
    echo "</div>\n";
  }

  function get_blog($limit) {
    $db = new PDO(DBCONNECT, DBUSER, DBPASS);
    $sql = 'select body, stamp from posts order by stamp desc';
    if (isset($limit) && $limit > 0) $sql = $sql . ' limit ' . $limit;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch())
      format_post($row['stamp'], $row['body']);
    $stmt = null;
    $db = null;
  }

  function get_single() {
    if (isset($_GET['d'])) {
      $db = new PDO(DBCONNECT, DBUSER, DBPASS);
      $sql = 'select body, stamp from posts where stamp = ?';
      $stmt = $db->prepare($sql);
      $stmt->bindParam(1,$_GET['d']);
      $stmt->execute();
      if ($row = $stmt->fetch())
        format_post($row['stamp'], $row['body']);
      $stmt = null;
      $db = null;
      get_discussion();
    }
  }

?>
