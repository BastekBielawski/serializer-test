<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonySerializerController
{
    /**
     * @Route("symfony/serialize")
     */
    public function serializeAction(): Response
    {
        return new JsonResponse();
    }

    /**
     * @Route("symfony/deserialize")
     */
    public function deserializeAction(): Response
    {
        return new JsonResponse();
    }
}
