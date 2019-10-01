<?php include_once("nav.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content ="width=device-width, initial-scale=1">
    <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<style type="text/css">
	  	.title{
	  		height: 50x;
	  		background-color:#000;
	  		color: #fff;
	  		text-align: center;

	  	}
	  	.content{
	  		text-align: center;
	  		height: 60px;
	  	}
	  	button{
	  		background-color: #FFF;
	  		border-radius: 5px ;
	  		border: 1px solid;
	  	}
	  	td:hover{
	  		background-color: #ccc;
	  		color: #ED4E4E;
	  	}
	  </style>
<body>
	  <div align="center">
            <form action="search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>
        
	<div class="container">
		<table width="1000px" border="1px">
			<tr class="title" border: >
				<td>id</td>
				<td>Gia</td>
				<td>title</td>
				<td>tac gia</td>
				<td>year</td>
			</tr>
			<?php 
			include_once("model/book.php");
			$file= book::getListFromFile();
			$ls= book::getList();
			// var_dump($ls);
			foreach ($file as $lsa) { ?>
				<tr class="content" >
					<td><?php echo $lsa->id ; ?></td>

					<td><?php echo $lsa->sprice ; ?></td>
					<td><?php echo $lsa->title; ?></td>
					<td><?php echo $lsa->author; ?></td>
					<td><?php echo $lsa->year; ?></td>
					
				</tr>
				
			<?php  }
			

		 ?>
		</table>
	</div>


</body>
</html>