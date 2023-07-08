<?php $data = json_decode(file_get_contents("https://restcountries.eu/rest/v2/all"));
	$returndata = new stdClass;

print_r($data);

	$returndata->countryname = $data[0]->name;
	$returndata->phonecode = $data[0]->callingCodes[0];
	$returndata->flag = $data[0]->flag;
	$returndata->code = $data[0]->alpha2Code;
	$returndata->viennacode = NULL;
	return $returndata;