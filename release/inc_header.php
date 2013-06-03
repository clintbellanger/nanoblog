<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo SITETITLE; if (isset($subtitle)) echo " - " . $subtitle; ?></title>

  <?php
    if (ENABLERSS == true) {
      echo "  <link rel=\"alternate\" type=\"application/rss+xml\" href=\"/";
      echo RSSFILE;
      echo "\" title=\"";
      echo RSSDESC;
      echo "\" />\n";
    }
  ?>

</head>
<body>

  <div id="content">

