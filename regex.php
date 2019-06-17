<?php
$regexMail = '#^[\w._-]+@[\w.-_]+[.][a-z]+$#';
$regexName = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexPhone = '#^[0][1-9][0-9]{8}$#';
$regexAddress = '#^[0-9]{1,4}[A-Za-z]*+([ ][A-Za-zÀ-ÖØ-öø-ÿ0-9]+)+[ ][0-9]{5}[ ][A-Za-zÀ-ÖØ-öø-ÿ -]+$#';
$regexBirthDate = '#^([0-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$#';
$regexCity = '#^[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ -]+$#';
$regexNationality = $regexName;
$regexNumberEmploymentAgency = '#^[0-9]{7}[A-Z]{1}$#';
$regexNumber = '#^[0-9]+$#';
$regexLinkCodecademy = '#^https:\/\/www\.codecademy\.com\/[A-Za-z0-9]+$#';
$regexText = '#[<>]#';
$regexGraduate = '#^0|1|2|3|4$#';
$regexPoleEmploi = '#^[0-9]{7}[A-Z]{1}$/m';

?>
