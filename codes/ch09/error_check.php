<?php

function flagError($fieldName, $errStr) {
	global $fieldsWithError, $errors;
	$fieldsWithError[$fieldName] = 1;
	$errors[] = $errStr;
}

function hasError($fieldName) {
	global $fieldsWithError;
	if(isset($fieldsWithError[$fieldName])) {
		return true;
	} else {
		return false;
	}

	
}