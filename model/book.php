<?php 
class book{
	var $id;
	var $sprice;
	var $title;
	var $author;
	var $year;
	function __construct ($id,$sprice, $title, $author, $year){

		$this->id = $id;
		$this->sprice = $sprice;
		$this->title = $title;
		$this->author = $author;
		$this->year = $year;

	}
	function display(){
		echo 'Price:'. $this->sprice . "<br>";
		echo 'title:'. $this->title . "<br>";
		echo 'author:'. $this->author . "<br>";
		echo 'year:'. $this->year . "<br>";
	}

	static function getListFromFile(){
		$arrData = file("data/book.txt");
		$lsbook = array();
		foreach ($arrData as $getData) {
			$arrItem = explode("#", $getData);
			$book =new book($arrItem[0],$arrItem[2],$arrItem[1],$arrItem[3], $arrItem[4]);
			array_push($lsbook,$book);	    	
		};
		return $lsbook;
	}
	static function connect(){
		$con = new mysqli("localhost","root","","quanlysach");
		$con->set_charset("utf8");
		if ($con->connect_error) {
			die("ket noi that bai:" .$con->connect_error );
		}
		return $con;
	}
	static function getListFormDB(){
			// tao ket noi
		$con = new mysqli("localhost","root","","quanlysach");
		$con = book::connect();
			// thao tac voi csdl
		$sql = "SELECT * FROM `book`";
		$result= $con->query($sql);
		$lsbook = array();
		if($result->num_row >= 0){
			while ($row = $result->fetch_assoc()) {
				$book =new book($row["ID"],$row["Price"],$row["TITILE"],$row["Author"], $row["Year"]);
				array_push($lsbook,$book);
			}
		}
			// giai phong ket noi
		$con->close();
		return $lsbook;
	}
	static function search($search){
		$file = book::getListFormDB();
		if (empty($search)) {
			foreach ($file as $lsa) { ?>
				<?php echo  '<tr class="content" >
				<td>'. $lsa->id .'</td>
				<td>'. $lsa->sprice .'</td>
				<td>'. $lsa->title . '</td>
				<td>'. $lsa->author .'</td>
				<td>'. $lsa->year . '</td>
				<td><button name="sua">sua</button><button name="xoa">xoa</button></td>
				</tr>';
				?>
			<?php  }
		}
		else{
			foreach ($file as $lsa){
				if (strlen(strstr(strtolower($search) , strtolower($lsa->id))) !=0 || strlen(strstr(strtolower($search) , strtolower($lsa->sprice)))!=0  || strlen(strstr(strtolower($lsa->title) , strtolower($search)))!=0 ||  strlen(strstr(strtolower($search) ,strtolower($lsa->author)))!=0||  strlen(strstr(strtolower($search) ,strtolower($lsa->year)))!=0) { ?>
					<?php echo  '<tr class="content" >
					<td>'. $lsa->id .'</td>
					<td>'. $lsa->sprice .'</td>
					<td>'. $lsa->title . '</td>
					<td>'. $lsa->author .'</td>
					<td>'. $lsa->year . '</td>
					<td><button name="sua">sua</button><button name="xoa">xoa</button></td>
					</tr>';
					?>
					<?php $eva=1; }
					
				}	
				if ($eva!=1) {
					echo '<td colspan="6" align="center">  Khong tìm thấy</td>';
				}
			}
		}
		static function add($idadd,$giaadd,$titleadd,$tacgiaadd,$yearadd){
			$arrd =  book::getListFormDB();
			$con = book::connect();
			if (!empty($giaadd)&&!empty($titleadd)&&!empty($tacgiaadd)&&!empty($yearadd)) {
				$sql = "INSERT INTO book (TITILE, Price, Author	,Year)
				VALUES ('$titleadd', '$giaadd', '$tacgiaadd','$yearadd')";
				if ($con->query($sql) === TRUE) {
					echo "New record created successfully";
				} 			
			}
			$con->close();
		}
		static function delete($id){
			$con= book::connect();
			$arrd = book::getListFormDB();
			$sql = "DELETE FROM book WHERE ID=$id";
			if ($con->query($sql) === TRUE) {
				echo "Record deleted successfully";
			} 
			$con->close();
		}
		static function edit($idedit,$editid,$giaedit,$titledit,$tacgiaedit,$yearedit){
			$arrds  = book::getListFormDB();
			$con    = book::connect();
			$sql    = "UPDATE book SET 
			TITILE  ='$titledit', 
			Price   ='$giaedit',
			Author  =',$tacgiaedit',
			Year    ='$yearedit'  
			WHERE ID=$idedit";
			if ($con->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			$con->close();
		}
		static function pagination($post_in_page,$numberPage) {
			$arrds = book::getListFromFile();
			// $out[];

			for($i=$post_in_page*$numberPage-1; $i<=$post_in_page*$numberPage && $i<=sizeof($arrds);$i++){
				echo  '<tr class="content" >
				<td>'. $arrds[$i]->id .'</td>
				<td>'. $arrds[$i]->sprice .'</td>
				<td>'. $arrds[$i]->title . '</td>
				<td>'. $arrds[$i]->author .'</td>
				<td>'. $arrds[$i]->year . '</td>
				<td><button name="sua">sua</button><button name="xoa">xoa</button></td>
				</tr>';
				echo $i;
			}
		}
		
	}

	?>