<?php

/**
 * 取邮箱的登陆域名
 * @param  string $email 
 * @return string    
 */
function mail2Domain($email){
	return 'http://mail.'.substr($email, intval(strpos($email, '@')) + 1);
}