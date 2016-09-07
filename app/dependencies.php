<?php
// DIC configuration

$container = $app->getContainer();

// Doctrine
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\BairroAction'] = function ($c) {
    $bairroRepository = new \App\Repository\Bairro($c->get('em'));
    return new App\Action\BairroAction($bairroRepository);
};

$container['App\Action\UsuarioAction'] = function ($c) {
    $usuarioRepository = new \App\Repository\Usuario($c->get('em'));
    return new App\Action\UsuarioAction($usuarioRepository);
};

$container['App\Action\OcorrenciaAction'] = function ($c) {
    $ocorrenciaRepository = new \App\Repository\Ocorrencia($c->get('em'));
    return new App\Action\OcorrenciaAction($ocorrenciaRepository);
};
