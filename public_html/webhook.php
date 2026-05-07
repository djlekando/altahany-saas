<?php

$secret = "ALTATAHANY_SECRET";

$headers = getallheaders();

if(($headers['X-Hub-Signature-256'] ?? '') === $secret){
    shell_exec("bash /home/u860915731/domains/altahany.com/deploy.sh");
    http_response_code(200);
    echo "OK";
}else{
    http_response_code(403);
    echo "FORBIDDEN";
}
