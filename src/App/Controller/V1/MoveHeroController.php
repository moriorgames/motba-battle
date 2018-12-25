<?php

namespace App\Controller\V1;

use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MoveHeroController extends AbstractController
{
    /**
     * List the heroes moves in the system.
     *
     * @Route("/api/v1/move-hero/list", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="List the heroes moves in the system."
     * )
     * @SWG\Parameter(
     *     name="order",
     *     in="query",
     *     type="string",
     *     description="The field used to order rewards"
     * )
     * @SWG\Tag(name="Move Hero")
     */
    public function list()
    {
        return $this->json(['hello' => 'api']);
    }
}
