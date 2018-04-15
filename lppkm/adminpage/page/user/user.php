<?php
switch ($_GET['menu']) {
	case 'man-user':
		if(ADMIN_LEVEL==999991){
			include "daftar-user.php";
		}
	break;
		
	case 'my-profile':
		include "my-profile.php";
	break;
	
	default:
		echo "<script>location.href='".ADMIN_PAGE."dashboard.php?page=user&menu=man-user'</script>";
	break;
}
?>