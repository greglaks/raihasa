<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>";
echo "<script src='admin.js'></script>";

echo "<form  method='post' action='newfile.php' enctype='multipart/form-data'>";

echo "<input type='file' name='upload' multiple />";
echo "<select id='projectselectlist' name='projectselectlist'> </select>";


echo "<input type='submit' value='submit'>";
echo "</form>";

echo "<script type='text/javascript'>";
echo"
$(function(){
	initProjectCombobox();
});
</script>
";



?>