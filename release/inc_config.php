<?

// REQUIRED SETTINGS. CHANGE THESE BEFORE DEPLOYING

// database password used when setting up the nanouser
define("DBPASS", "set-a-database-password-here");
define("SITETITLE", "Nano Blog");

//-----------------------------------------------------------------------------
// OPTIONAL SETTINGS.

// blog settings
// change these if you didn't use the default blog and mysql setup
define("CLASSNAME", "nanoblog");
define("PERMALINK", "/blog/");
define("DBCONNECT", "mysql:host=localhost;dbname=nanoblog");
define("DBUSER", "nanouser");
define("STAMPDELIM", "-");
define("POSTCOUNT", 5);

// rss settings
// if enabling RSS, change all of these settings to match your site
define("ENABLERSS", false);
define("HOMELINK", "http://yourwebsite.com/");
define("FULLLINK", "http://yourwebsite.com/blog/");
define("RSSFILE", "nanoblog.rss");
define("RSSTITLE", "Nano Blog");
define("RSSDESC", "Nano Blog RSS Feed");

// disqus settings
// If you leave this blank, comments are disabled
define("DISQUS_SHORTNAME", "");

?>
