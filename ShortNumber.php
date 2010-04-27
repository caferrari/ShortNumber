<?php
/* 
 * Copyright (c) 2009, Carlos André Ferrari <[carlos@]ferrari.eti.br>
 * All rights reserved.
 */

/**
 * Short Number
 *
 * A simple class that helps you to generate numbers encoded 
 * in any base, based on a string ;)
 * 
 * @version	0.1
 * @author	Carlos André Ferrari <carlos@ferrari.eti.br>
 */
class ShortNumber {

	/**
	 * String that contains the base strings to encode numbers
	 * @var			String	
	 * @access		private
	 */
	private $letters = null;


	/**
	 * Constructor
	 * @param	String	$l	Optional custom string to encode
	 * @return	void
	 */
	public function __construct($l=false)
	{
		$this->letters = $l ? $l : implode("", array_merge(range("0", "9"), range("a", "z"), range("A", "Z"))) . "_-+.|*[]{}()";
	}

	/**
	 * Define the string to make the encodes
	 * @param	String	$l	custom string to encode
	 * @return	void
	 */
	public function setLetters($l)
	{
		$this->letters = $l;
	}

	/**
	 * Return the base string
	 * @return	String
	 */
	public function getLetters()
	{
		return $this->letters;
	}

	/**
	 * Return the BaseX encode.
	 * @return	Integer
	 */
	public function getBase()
	{
		return strlen($this->letters);
	}

	/**
	 * Encode a number into the short format
	 * @param	Integer	$number	Number
	 * @return	String
	 */
	public function encode($number)
	{
		$chars = strlen($this->letters);
		$tmp = array();
		while ($number >= $chars){
			$tmp[] = $number % $chars;
			$number = floor($number / $chars);
		}
		$tmp[] = $number;
		$str = '';
		for ($x=count($tmp)-1; $x>=0; $x--)
			$str .= $this->letters{$tmp[$x]};
		return $str;
	}

	/**
	 * Decode a baseX number into the base 10 format
	 * @param	String	$number	Number
	 * @return	Int
	 */
	function decode($number)
	{
		$acc = 1;
		$res = 0;
		$len = strlen($this->letters);
		for ($x=strlen($number)-1;$x>=0;$x--){
			$res += $acc * (strpos($this->letters, $number{$x}));
			$acc *= $len;
		}
		return $res;
	}

}
