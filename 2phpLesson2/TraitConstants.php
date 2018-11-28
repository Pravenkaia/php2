<?
trait TraitConstants {
	const WEIGHT1 = 10;
	const WEIGHT2 = 50;
	const WEIGHT3 = 100;
	const WEIGHT4 = 500;
	
	const DISCOUNT1 = 5;
	const DISCOUNT2 = 10;
	const DISCOUNT3 = 15;
	const DISCOUNT4 = 20;
	
	function changePrice($price,$amount) {
		if ($amount  >= WEIGHT1 && $amount  < WEIGHT2) 
			return $price * (1 - DISCOUNT1 / 100); 
		elseif ($amount  >= WEIGHT2 && $amount  < WEIGHT3) 
			return $price * (1 - DISCOUNT2 / 100); 
		elseif ($amount  >= WEIGHT3 && $amount  < WEIGHT4) 
			return $price * (1 - DISCOUNT3 / 100); 
		elseif (($amount  >= WEIGHT4) )
			return $price * (1 - DISCOUNT4 / 100); 
		else 
			return $price;
	}
	
}
?>