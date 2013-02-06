<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); 

 $url = $jsonURL;
 preg_match_all('/%%.+?%%/', $url, $matches);
 if (count($matches) == 1) {
   for ($i=0; $i<count($matches[0]); $i++)
   {
     $vartoprocess = substr(substr($matches[0][$i], 0, strlen($matches[0][$i]) - 2), 2);
     $valuetoreplace = isset($_GET[$vartoprocess]) ? $_GET[$vartoprocess] : ""; 
     $url = str_replace($matches[0][$i], $valuetoreplace, $url);     
   }
 }
 
if (!$isEditMode) {
?>
<script language="javascript">
$(function() {
  $.ajax({
    url: "<?php echo $url; ?>",
    dataType: "<?php echo $jsonURLType; ?>",
    data: { },
    jsonp: "<?php echo $jsonURLType; ?>",
    success: function (data) {
      $("#<?php echo $divId; ?>").loadJSON(data);
      <?php echo $jscontent; ?>
    }
  });            
});
</script>
<?php
} else {
?><b>jQuery Load JSON - Not activated in edit mode</b>
<?php 
}
?>