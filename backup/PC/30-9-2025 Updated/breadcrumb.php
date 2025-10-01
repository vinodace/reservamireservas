<?php
$currentFile = basename($_SERVER['PHP_SELF']);
$excludedPages = ['index.php']; // Add more as needed

if (!in_array($currentFile, $excludedPages)) {

  $currentPage = basename($currentFile, ".php");
  $currentPage = str_replace("-", " ", $currentPage);
  $currentPage = ucwords($currentPage);
  ?>

<div class="brdcrumb-bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12">
      <ul class="brdcrumb-list">
        <li><a href="./">Home</a></li>
        <li><?php echo $currentPage; ?></li>
      </ul>
    </div>
    </div>
  </div>
</div>  
<?php
}
?>