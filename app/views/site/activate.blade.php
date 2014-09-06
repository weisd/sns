

<?php switch($type):?>
<?php case 0:?>
链接失效
<?php break; case 1:?>
已经发送邮件到{{$email}}请注意查收<br>
{{HTML::link(mail2Domain($email), 'go to your mail')}}

<?php endswitch;?>