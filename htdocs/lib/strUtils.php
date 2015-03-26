<?php


function isFormFieldValid( $field ) {
	return $field != null &&
	$field != "" && !preg_match( '.\'|;|\\||%.', $field, $matches);
}

function isEmailValid( $email ) {
if (eregi("^[a-z0-9._-]+@[a-z0-9._-]+.[a-z]{2,6}$", $email))
    { return TRUE; } else { return FALSE; } 
}

?>