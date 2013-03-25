<?php
  $subtitle = 'Blog';
  include('inc_header.php');
  include('inc_nanoblog.php');
?>

<?php
  get_blog(POSTCOUNT); 
?>

<div id="archive">
  <a href="/blog/archive/">view archive</a>
</div>

<?php
  include('inc_footer.php');
?>
