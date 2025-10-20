<!doctype html>
<html>
  <head>
    <title>zadania PHP</title>
    <meta charset="utf-8" />
  </head>
  <body>
	<form action="" method="post">
		Podaj numer miesiąca
		<input type="numeric" name="mc" />
		<input type="submit" value="Pokaż komunikat" />
	</form>
	<br />
	<?php
		if (!isset($_POST['mc'])) exit;
		try
		{			
			$mc=$_POST['mc'];
			if ($mc<1 || $mc>12) throw new Exception('Nie ma miesiąca o podanym numerze!');
			
			$data=getdate();
			$nr=$data['mon'];
			if ($nr==$mc) echo 'Dzisiaj mamy miesiąc o podanym numerze'; 
			else
			echo 'Podałeś nieprawidłowo numer aktualnego miesiąca';
		}
		catch(Exception $m)
		{
			echo $m->getMessage();
		}	
	?>
  </body>
</html>