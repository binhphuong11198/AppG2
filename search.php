<?php 
	include_once("model/book.php");
	$file= book::getListFromFile();
if (isset($_REQUEST['ok'])) {
	$search= addslashes($_GET['search']);
	if (empty($search)) { ?>
		<table width="1000px" border="1px">
			<tr class="title" border: >
				<td>id</td>
				<td>Gia</td>
				<td>title</td>
				<td>tac gia</td>
				<td>year</td>
			</tr>
			<?php 
		
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
<?php	}
else {


	foreach ($file as $lsa) {
		if (strcmp($search , $lsa->id) ==0 || strcmp($search , $lsa->sprice)==0  || strcmp($search , $lsa->title)==0 ||  strcmp($search ,$lsa->author)==0||  strcmp($search ,$lsa->year)==0) { ?>
			<table width="1000px" border="1px">
			<tr class="title" border: >
				<td>id</td>
				<td>Gia</td>
				<td>title</td>
				<td>tac gia</td>
				<td>year</td>
			</tr>
			<?php 
			
			// var_dump($ls);
			 ?>
				<tr class="content" >
					<td><?php echo $lsa->id ; ?></td>
					<td><?php echo $lsa->sprice ; ?></td>
					<td><?php echo $lsa->title; ?></td>
					<td><?php echo $lsa->author; ?></td>
					<td><?php echo $lsa->year; ?></td>
					
				</tr>
				
			<?php  
		 ?>
		</table>
		<?php
		$avc=1;
		 }
		
	}
	if ($avc!=1) {
		echo 'khong tim thay';
	}

}

}?> 	