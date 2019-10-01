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
		 static function getList(){
	    	$listBook = array();
	    	array_push($listBook, new book(1,50,"OOP in PHP","Ndungithue",2019) );
	    	array_push($listBook, new book(2,251,"OOP in jav","ddas",2019) );
	    	array_push($listBook, new book(3,352,"OOP in c#","dddd",2019) );
	    	array_push($listBook, new book(4,453,"OOP in python","sdas",2019) );
	    	array_push($listBook, new book(5,54,"OOP in ruby","asdas",2019) );
	    	return $listBook;
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
	}
 ?>