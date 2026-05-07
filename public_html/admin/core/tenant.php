<?php

function tenantId(){
    // لاحقاً: من الدومين أو login
    return $_SESSION['tenant_id'] ?? 1;
}

function tenantWhere(){
    return "tenant_id = ".tenantId();
}
