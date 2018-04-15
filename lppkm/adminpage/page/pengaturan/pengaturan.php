<?php
switch ($_GET['menu']) {
	case 'web-setting':
		include "web-setting.php";
	break;

	case 'link-terkait':
		include "link-terkait.php";
	break;

	case 'man-bidang':
		include "man-bidang.php";
	break;
	
	default:
		echo "<script>location.href='".ADMIN_PAGE."dashboard.php?page=pengaturan&menu=web-setting'</script>";
	break;
}
?>