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
    #[Route('/persona', name: 'create_persona')]
    public function createProduct(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();

        $persona = new Persona();
        $persona->setDni('5555');
        $persona->setNombre('test');
        $persona->setApellidos('test test');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($persona);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new JsonResponse($persona->getId());
    }

    #[Route('/persona', name: 'product_show')]
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
    #[Route('/persona/{id}', name: 'product_show')]
    public function findPersona(ManagerRegistry $doctrine, int $id): JsonResponse
    {
        $persona = $doctrine->getRepository(Persona::class)->find($id);

        if (!$persona) {
            throw $this->createNotFoundException(
                'No persona found for id '.$id
            );
        }

        return new JsonResponse($persona->getNombre());
    }
    
}
