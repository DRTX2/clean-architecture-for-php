<?php

use DI\Container;
use function DI\autowire;
use Doctrine\ORM\EntityManagerInterface;

use Domain\Repositories\AuthRepository;
use Infrastructure\Repositories\AuthRepositoryMysql;

use Application\UseCases\LoginUser;
use Application\DTOs\Auth\LoginUserDto;

use Infrastructure\Security\JWTService;

use Presentation\Controllers\AuthController;

return function (Container $container) {
    // EntityManager (creado en bootstrap y registrado como 'EntityManager')
    $container->set(EntityManagerInterface::class, fn() => $container->get('EntityManager'));

    // JWTService (no se puede autowirear por usar string del .env)
    // $container->set(JWTService::class, fn() => new JWTService($_ENV['JWT_SECRET']));

    // Repositorio: interfaz -> implementación
    // $container->set(AuthRepository::class, autowire(AuthRepositoryMysql::class));

    // UseCases
    // $container->set(LoginUser::class, autowire(LoginUser::class));

    // Controladores
    // $container->set(AuthController::class, autowire(AuthController::class));

    // (Opcional) otros DTOs o servicios pueden agregarse si necesitás personalización
};
