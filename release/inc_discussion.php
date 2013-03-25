<?php

  function get_discussion() {
    if (DISQUS_SHORTNAME != "") {
      echo "<div id=\"disqus_thread\"></div>\n";
      echo "<script type=\"text/javascript\">\n";
      echo "  (function() {\n";
      echo "    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;\n";
      echo "    dsq.src = 'http://" . DISQUS_SHORTNAME . ".disqus.com/embed.js';\n";
      echo "    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);\n";
      echo "  })();\n";
      echo "</script>\n";
	}
  }
 
  function get_comment_counts() {
    if (DISQUS_SHORTNAME != "") {
      echo "<script type=\"text/javascript\">\n";
	  echo "  (function () {\n";
	  echo "    var s = document.createElement('script'); s.async = true;\n";
	  echo "    s.type = 'text/javascript';\n";
	  echo "    s.src = 'http://" . DISQUS_SHORTNAME . ".disqus.com/count.js';\n";
      echo "    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(s);\n";
	  echo "  }());\n";
      echo "</script>\n\b";    
    }
  }
  
?>
