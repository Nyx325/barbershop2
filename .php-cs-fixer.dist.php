<?php

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        '@PSR12' => true,  // Usar el estándar PSR-12
        'array_syntax' => ['syntax' => 'short'],  // Usar la sintaxis corta de arrays
        'declare_strict_types' => true,  // Añadir declare(strict_types=1);
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src') // Carpeta donde están los archivos a analizar
            ->exclude('vendor') // Excluir la carpeta vendor
    );
