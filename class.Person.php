<?php

class Person{
	
	private $username;
	private $weight;
	private $height;
	
	public function __construct($username, $weight, $height){
		$this->username = $username;
		$this->weight = $weight;
		$this->height = $height;
	}
    //GET methods
	/////////////////////////////////////
	public function getusername(){
		return $this->username;
	}
    public function getweight(){
		return $this->weight;
	}
    public function getheight(){
		return $this->height;
	}
    //setMethods
	////////////////////////////////////////
    
    public function setusername(){
		return $this->username;
	}
    public function setweight(){
		return $this->weight;
	}
    public function setheight(){
		return $this->height;
	}
    //function to calculate and return BMI useing it as function other than constructor use
    ///////////////////////////////////////////
    public function getBMI(){

        return ($this->weight)/(($this->height*$this->height));
} 
}

?>