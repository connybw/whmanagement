<?php
// Include and instantiate the class.
require_once 'mobileDetect/Mobile_Detect.php';
$detect = new Mobile_Detect;
$device = 'pc';
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
	$device = 'mobile';
}
 
// Any tablet device.
if( $detect->isTablet() ){
 $device = 'tablet';
}
 
// Exclude tablets.
if( $detect->isMobile() && !$detect->isTablet() ){
	$device = 'phone';
}
 
// Check for a specific platform with the help of the magic methods:
if( $detect->isiOS() ){
  $os = 'ios';
}
 
if( $detect->isAndroidOS() ){
 $os = 'android';
}
?>