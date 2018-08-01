<?php
    if(isset($_GET['page']))
    {
         switch($_GET['page'])
        {
            case '': include'menu/button/dashboard.php'; break;
            case 'today': include'menu/charts/today.php'; break;
            case 'daily': include'menu/charts/daily.php'; break;
            case 'weekly': include'menu/charts/weekly.php'; break;
	          case 'monthly': include'menu/charts/monthly.php'; break;
            case 'daily_comparison': include'menu/charts/daily_comparison.php';break;
            case 'monthly_comparison': include'menu/charts/monthly_comparison.php';break;
	          // case 'yearly': include'menu/charts/yearly.php'; break;
	          case 'dashboard': include'menu/button/dashboard.php'; break;


          // default: include'404.php'; break;
        }
    } else  {
      include 'menu/button/dashboard.php';
    }
?>
