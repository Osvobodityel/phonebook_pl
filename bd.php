<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Książka telefoniczna</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="main">
		<p id="texthere">Książka Telefoniczna</p>
	<div id="form1">
		<form action="bd.php" method="POST">
			<span id="span1">Imię:</span> <input type="text" name="imie" maxlength="20" class="input"><br>
			<span id="span2">Nazwisko:</span> <input type="text" name="nazwisko" maxlength="30" class="input"><br>
			<span id="span3">Telefon:</span> (XXX-XXX-XXX)<input type="text" name="telefon" maxlength="15" class="input">
			<input type="submit" name="submit" value="Dodaj nr.">
		</form>
	</div>

	<div id="form_search">
		<form action="bd.php" method="POST">
			Szukana fraza <input type="text" name="szukane" class="input"><input type="submit" value="Szukaj" name="Szukaj">
		</form>
	<?php
		ob_start();
		$pol=mysqli_connect("localhost","root","","telefony")or die("Nie mozna połączyć się z bazą danych");
		$zap="select * from telefony";
		if(isset($_POST['submit'])){
		$i=$_POST['imie'];
		$n=$_POST['nazwisko'];
		$t=$_POST['telefon'];
		if(!empty($i)&&!empty($n)&&!empty($t)){
			$zap2="Insert into telefony values (NULL, '$i', '$n', '$t') ";
			mysqli_query($pol, $zap2);
			}
		}
		//======================wyszukiwanie=======================
		if(isset($_POST['Szukaj'])){
		$licznik2=1;
		$szukana=$_POST['szukane'];
		$zap_szukajace="SELECT * FROM telefony WHERE Imie LIKE '%$szukana%' or Nazwisko LIKE '%$szukana%' or Telefon LIKE '%$szukana%'";
		if(!empty($szukana)){
		$wyszukane=mysqli_query($pol, $zap_szukajace);
		echo "<table>";
		while($r=mysqli_fetch_array($wyszukane)){
				echo "<tr><td>".$licznik2."</td><td>".$r['Imie']."</td><td>".$r['Nazwisko']."</td><td>".$r['Telefon']."</td><td><a href=\"bd.php?a=usun&amp;id={$r['Id_telefony']}\"><button>Usuń</button></a></td><td><a href=\"bd.php?a=edytuj&amp;id={$r['Id_telefony']}\"><button>Edytuj</button></a></td></tr>";
		$licznik2++;
		}
		echo "</table>";
	}
	}
		//==========================================================
		?>
	</div>
	<div id="list">
		<table>
			<tr>
				<th>L.P</th><th>Imię</th><th>Nazwisko</th><th>Telefon</th><th>Usuń</th><th>Edytuj</th>
			</tr>
		<?php
			$wynik=mysqli_query($pol, $zap);
			$licznik=1;
			
			while($k=mysqli_fetch_array($wynik)){
			echo "<tr><td>".$licznik."</td><td>".$k['Imie']."</td><td>".$k['Nazwisko']."</td><td>".$k['Telefon']."</td><td><a href=\"bd.php?a=usun&amp;id={$k['Id_telefony']}\"><button>Usuń</button></a></td><td><a href=\"bd.php?a=edytuj&amp;id={$k['Id_telefony']}\"><button>Edytuj</button></a></td></tr>";
			$licznik++;
		}
		?>
		</table>
	</div>
<?php
@$a=trim($_REQUEST['a']);
@$id=trim($_GET['id']);

if($a=='usun' and !empty($id)){
	$u="delete from telefony where Id_telefony='$id'";
	mysqli_query($pol, $u);
	header('Location:bd.php');
}

if($a=='edytuj' and !empty($id)){
	$edycja="select * from telefony where Id_telefony='$id'";
	$wynik=mysqli_query($pol, $edycja);
	$edytowany=mysqli_fetch_array($wynik);
	echo '<form action="bd.php" method="POST">
		<input type="hidden" name="a" value="zapisz" class="input">
		<input type="hidden" name="id" value="'.$id.'" class="input">
		Imię: <input type="text" name="imie" maxlength="20" value="'.$edytowany['Imie'].'" class="input"><br>
		Nazwisko: <input type="text" name="nazwisko" maxlength="30" value="'.$edytowany['Nazwisko'].'" class="input"><br>
		Telefon: (XXX-XXX-XXX)<input type="text" name="telefon" maxlength="15" value="'.$edytowany['Telefon'].'" class="input">
		<input type="submit" value="Zmień">
	</form>';
}

if($a=='zapisz')
{
	$id=$_POST['id'];
	$imie=trim($_POST['imie']);
	$nazwisko=trim($_POST['nazwisko']);
	$telefon=trim($_POST['telefon']);
	$aktualizacja="update telefony set Imie='$imie', Nazwisko='$nazwisko', Telefon='$telefon' where Id_telefony='$id'";
	mysqli_query($pol, $aktualizacja);
	header('Location:bd.php');
}

	mysqli_close($pol);

?>
	</div>
</body>
</html>