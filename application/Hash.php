<?php
class Hash {
	public static function MstrrHash($Algoritmo, $Data, $Key){
		$Hash = hash_init($Algoritmo, HASH_HMAC, $Key);
		hash_update($Hash, $Data);

		return hash_final($Hash);
	}
}
?>