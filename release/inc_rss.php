<?php

  function create_item($fout, $stamp, $body) {
    fwrite($fout, '    <item>' . "\n");
    fwrite($fout, '      <title>' . $stamp . '</title>' . "\n");
    fwrite($fout, '      <link>' . FULLLINK . $stamp . '</link>' . "\n");
    fwrite($fout, '      <description>' . substr(strip_tags($body),0,128) . '</description>' . "\n");
    fwrite($fout, '    </item>' . "\n");
  }

  function create_rss() {

    $fout = fopen(RSSFILE, 'w');
    fwrite($fout, '<?xml version="1.0"?>' . "\n");
    fwrite($fout, '<rss version="2.0">' . "\n");
    fwrite($fout, '  <channel>' . "\n");
    fwrite($fout, '    <title>' . RSSTITLE . '</title>' . "\n");
    fwrite($fout, '    <link>' . HOMELINK . '</link>' . "\n");
    fwrite($fout, '    <description>' . RSSDESC . '</description>' . "\n");

    $db = new PDO(DBCONNECT, DBUSER, DBPASS);
    $sql = 'select body, stamp from posts order by stamp desc';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch())
      create_item($fout, $row['stamp'], $row['body']);
    $stmt = null;
    $db = null;

    fwrite($fout, '  </channel>' . "\n");
    fwrite($fout, '</rss>' . "\n");
    fclose($fout);
  }

?>
