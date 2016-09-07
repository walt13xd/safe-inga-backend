<?php
// Routes

$app->get('/api/bairro', 'App\Action\BairroAction:fetch');
$app->get('/api/bairro/{id}', 'App\Action\BairroAction:fetchOne');
