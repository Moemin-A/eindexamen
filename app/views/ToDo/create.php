
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/style.css">

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<div class="col text-right">
		</div>
	</div>
<br>
<form action="<?=URLROOT;?>/Autos/create" method="post">
<div class="container">
<div class="row">
<br><br>

<div class="row">
	<div class="col">
		<div class="form-group">
			<label>Auto</label>
			<select class="form-select" name="Auto" aria-label="Default select example">
			<?= $data['MankementData']?>
</select>
</div>

	<div class="col">
	<label>Mankement</label>
		<div class="form-group">
		<input type="text" placeholder="" class="form-control" name="Mankement" value="">
		</div>
	</div>
	<div class="col">
		<div class="form-group">
			<label>Datum</label>
			<input type="date" placeholder="" class="form-control" name="Datum" value="">
		</div>
	</div>
</div>
<div class="row">
<br>
  <br>
 
<td>
<input type="hidden" name="Id" >
  </td>  
<div class="row">
	<div class="col">
</div>
</div>
<input type="submit" value="verzenden" id="btn1">

<div class="container">
<a class="btn btn-primary float-end" href="<?=URLROOT; ?>/Autos/index" role="button" id= "btn2">Terug</a>
</div>