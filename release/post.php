<?php
  $subtitle = 'Blog Post';
  include('inc_header.php');
  include('inc_nanoblog.php');
?>

<?php
  if (isset($_GET['d'])) get_single();
?>

<div id="archive">
  <a href="/blog/archive/">view archive</a>
</div>

<?php
  include('inc_footer.php');
?>
