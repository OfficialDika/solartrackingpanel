<?php
    if(isset($_GET['page']))
    {
         switch($_GET['page'])
        {
            case '': include'menu/charts/button.php'; break;
            case 'daily': include'menu/charts/daily.php'; break;
            case 'weekly': include'menu/charts/weekly.php'; break;
	        case 'monthly': include'menu/charts/monthly.php'; break;
	        case 'yearly': include'menu/charts/yearly.php'; break;
	        case 'button': include'menu/button/button.php'; break;


            default: include'404.php'; break;
        }
    } else
    {
      include'menu/charts/button.php';
    }
?>
