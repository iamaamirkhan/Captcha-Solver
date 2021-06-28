<?php
function getstr($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
#------------------------------------------------#
# -------------------- [recaptcha] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api2/anchor?ar=1&k=6Lfwy8YZAAAAAOymsOdsZ7xDAG-TFKW_fij1Wnjg&co=aHR0cHM6Ly9mb250YXdlc29tZS5jb206NDQz&hl=en&v=5mNs27FP3uLBP3KBPib88r1g&size=invisible&cb=d4ndji99l21y');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'User-Agent: User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Accept: */*';
$headers[] = '';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$curl = curl_exec($ch);
curl_close($ch);
// echo $curl;

$tr = trim(strip_tags(getStr($curl,'<input type="hidden" id="recaptcha-token" value="', '"')));
// echo $tk;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api2/reload?k=6Lfwy8YZAAAAAOymsOdsZ7xDAG-TFKW_fij1Wnjg');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'User-Agent: User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Accept: */*';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'v=&reason=q&c='.$tr.'&k=5mNs27FP3uLBP3KBPib88r1g¹03AGdBq24O5pcm_54kCY-TY7cMQJeNKAnAv1h8OJ_oSOzl_K-AhDPXFEQvuxEYY0tBUnErQAZ6OVUQIDqPWu8EyPh4ziTK7A1R1PLHGv2yJqdpnPVVlby5xxW08WrAJEYxW42-jI7bwAZl3CO4WqqGcqSwtCRHksyIKizHP13_AG1kI9Kg9uB0XRyjqadNnaO-qFPLx3dtouCYb7RtRlyl_wcLEz7o3eG69oUG5l3JYOxVSxl5XsjkjHnV78iYe_uAHZbGg0abDw97dHBJVUgP7EQcgavf7UrW2UGnKbF8ZhWgZQLP2VHs7BUEsV8j06tX66QA289fKbeQt862aM3H9q-vnrV_Rt64qe78bDm8eNp0z6HiqAOI3Vkq7jBZV5fS_3fofBSYe07GVBJcReWme3p95Yu8IEmttPnEtg8_Z6coPvz0ya4eH715A2xYR_cilUGZbn58VcM9KPxMmIu-Y3NJxfxwldoung7isHOQSFUD6sQJAi7E8HO2I5gwyELQcumioe7bsQ1Vxsv5lUf3lxyFrM9Iiw_SgKhGMdSWkHk0wYGtbF2agmYumE4r4_XhSHWiF1vVKvJVm15ic1Jz-yKIUHS1HcoC2j2eELxPigFHSyY2mapcwG6ZiPweNIV-gxOvn2xFF-PsHu0D4TC-4E5L62JW-ERh1FLoJ5Xs7GuzfgplyzXv1PaOzd0lr5S3NqkC7AYcYYAXSIYDcweI0WgDxJvWoVfunK80-GUQbjqb2wIZltyo7GHAG1lPOT1iQeojfiHpGRt28vfktAA6QGJ1dB44jwsDqHptR0c2-QpbTZKFll77PrsaBrzF7iNe0jloZbXRJjxXpNX7ErI9gAHvLLruDBjvXs9Jciod8xWcbJPVanCXurw3ss7v5lDKDNUnAeEdPaQMkn_x47XDK6uzbWvYeIUO1oKswyrI5XbOEUD6toXKqykRfnI2tKr2Ych2zBNs1vxbHu5nItRQF1elT6cBDjSJOnYKVGo7eOTPFmiEX0c4036DmFleYlWy5XJSHnSFyk5Gfi9RGwCBWKA4bmcXrWLsIRPz9BVBO7UhY_YejZ5l1Ok [42,1,28]');
$curl = curl_exec($ch);
curl_close($ch);
// echo $curl;

$tk = trim(strip_tags(getStr($curl,'["rresp","', '"')));
echo $tk;

#----------------------[ MADE BY AAMIR ]--------------------------#
?>