<?php
// Routes

$app->get('/api/bairro', 'App\Action\BairroAction:fetch');
$app->get('/api/bairro/{id}', 'App\Action\BairroAction:fetchOne');
$app->post('/api/usuario', 'App\Action\UsuarioAction:create');
$app->get('/api/usuario/timeline/{hash}', 'App\Action\UsuarioAction:timeline');
$app->post('/api/ocorrencia', 'App\Action\OcorrenciaAction:create');
