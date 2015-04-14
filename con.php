<?php


$resource = ssh2_connect('bluecarpetes.no-ip.org',6000);

if(ssh2_auth_password($resource,'root','q1w2e3mrs')){

    ssh2_scp_recv($resource,'/home/install','/home/marcio');

}

?>