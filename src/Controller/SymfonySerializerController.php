<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Serializer\SerializerInterface;
use App\Model\TestClass;
use App\Model\TestValueObject;

class SymfonySerializerController
{
    private Stopwatch $stopwatch;

    private SerializerInterface $serializer;

    /**
     * @param Stopwatch           $stopwatch
     * @param SerializerInterface $serializer
     */
    public function __construct(Stopwatch $stopwatch, SerializerInterface $serializer)
    {
        $this->stopwatch = $stopwatch;
        $this->serializer = $serializer;
    }

    /**
     * @Route("symfony/serialize")
     */
    public function serializeAction(): Response
    {
        $many = [];
        for($i=0;$i<100;$i++) {
            $many[] = new TestValueObject('dd'.$i);
        };

        $vo = new TestValueObject('wefwfwe');
        $test = new TestClass($vo, $vo, $many);

        $this->stopwatch->start('serialization');
        for($i=0;$i<1000;$i++) {
            $this->serializer->serialize($test, 'json');
        }

        $this->stopwatch->stop('serialization');

        return new JsonResponse($this->stopwatch->getEvent('serialization')->getDuration());
    }

    /**
     * @Route("symfony/deserialize")
     */
    public function deserializeAction(): Response
    {
        return new JsonResponse();
    }
}
