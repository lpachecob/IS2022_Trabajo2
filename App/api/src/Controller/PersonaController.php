<?php

namespace App\Controller;

use App\Entity\Persona;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class PersonaController extends AbstractController
{
    #[Route('/persona/create', name: 'create_persona')]
    public function createProduct(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $parameters = json_decode($request->getContent(), true);
        $response = new JsonResponse();
        
        $persona = new Persona();
        $dni = $parameters['dni'];

        if (empty($dni)) {
            $response->setData([
                'result' => 'failure',
                'error' => 'Dni is empty',
                'data' => null
            ]);
        }
        // $persona->setDni('5555');
        // $persona->setNombre('test');
        // $persona->setApellidos('test test');
        // $persona->setFechaDelRegistro(date_format(date_create(), 'U = Y-m-d H:i:s'));
        // $persona->setEdad(15);
        // $persona->setPeso(50.3);
        // $persona->setTalla(1.50);

        // // tell Doctrine you want to (eventually) save the Product (no queries yet)
        // $entityManager->persist($persona);

        // // actually executes the queries (i.e. the INSERT query)
        // $entityManager->flush();

        // return new JsonResponse($persona->getId());

        $response->setData([
            'result' => 'success',
            'data' => [
                'dni' => $persona->getDni()
            ],
        ]);

        return $response;
    }

    #[Route('/persona', name: 'mostrar_personas')]
    public function findPersonas(ManagerRegistry $doctrine): JsonResponse
    {
        $persona = $doctrine->getRepository(Persona::class)->findAll();

        if (!$persona) {
            throw $this->createNotFoundException(
                'No personas found'
            );
        }

        return new JsonResponse($persona);
    }
    #[Route('/persona/{id}', name: 'mostrar_persona')]
    public function findPersona(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $persona = $doctrine->getRepository(Persona::class)->find($id);

        if (!$persona) {
            throw $this->createNotFoundException(
                'No persona found for id ' . $id
            );
        }

        return new JsonResponse($persona->getNombre());
    }
}
