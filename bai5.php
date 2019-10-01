
	  <!-- Custom styles for this template-->
<?php include_once("nav.php"); ?>

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
	  </style>
</head>
<body>
	<div class="container">
		<table width="1000px" border="1px">
			<tr class="title" border: >
				<td>STT</td>
				<td>Từ năm</td>
				<td>Đến năm</td>
				<td>Lớp</td>
				<td>Nơi học</td>
				<td>Thao tác</td>
			</tr>
			<?php 
				include_once("model/thongtin.php");
				$thongtin=new thongtin(1,"mark","oto","@mdo","quan thai");
				for ($i = 0; $i <2 ; $i++) {
				$thongtin->display();
				echo '<br>';	
				}
				
			 ?>
		</table>
	</div>


	