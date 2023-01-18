<?php

namespace App\Controller\Api;

use App\Entity\Cliente;
use App\Repository\ClienteRepository;
use App\Repository\PersonaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClienteController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/clientes")
     * @Rest\View(serializerGroups={"cliente"}, serializerEnableMaxDepthChecks=true)
     */
    public function getClientes(ClienteRepository $repository, PersonaRepository $persona)
    {
        $cliente = $repository->findAll();
        $NotFoundMessage = new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => 'No hay clientes registrados',
        ], 400);

        if ($cliente === null) {
            return $NotFoundMessage;
        }
        return $cliente !== null ?
            $persona->findBy(['id' => $cliente]) :
            $NotFoundMessage;
    }
    /**
     * @Rest\Get(path="/cliente/{id}")
     * @Rest\View(serializerGroups={"cliente"}, serializerEnableMaxDepthChecks=true)
     */
    public function getCliente(ClienteRepository $repository, PersonaRepository $persona, $id)
    {
        $cliente = $repository->find($id);
        $NotFoundMessage = new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => 'Cliente no registrado!.',
        ], 400);

        if ($cliente === null) {
            return $NotFoundMessage;
        }
        return $cliente !== null ?
            $persona->find($cliente->getIdPersona()) :
            $NotFoundMessage;
        //return new JsonResponse([$persona->getDni(), $persona->getNombre(), $persona->GetApellidos()]);
    }
    /**
     * @Rest\Post(path="/cliente/")
     * @Rest\View(serializerGroups={"cliente"}, serializerEnableMaxDepthChecks=true)
     */
    public function createCliente(ClienteRepository $repository, Request $request)
    {
        $parameters = json_decode($request->getContent(), true);
        $cliente = $repository->findBy(['idPersona' => $parameters['idPersona']]);

        if ($cliente != null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => 'La persona con idPersona: ' . $parameters['idPersona'] . ', Ya es un cliente.',
            ], 400);
        }

        $cliente = new Cliente();
        $cliente->setIdPersona(isset($parameters['idPersona']) ? $parameters['idPersona'] : '');
        return $repository->save($cliente, true);
    }
    /**
     * @Rest\Post(path="/cliente/{id}")
     * @Rest\View(serializerGroups={"cliente"}, serializerEnableMaxDepthChecks=true)
     */
    public function updateCliente(ClienteRepository $repository, Request $request, $id)
    {
        $parameters = json_decode($request->getContent(), true);
        $cliente = $repository->find($id);
        $cliente->setIdPersona(isset($parameters['idPersona']) ? $parameters['idPersona'] : $cliente->getIdPersona());

        return $repository->save($cliente, true);
    }
    /**
     * @Rest\Delete(path="/cliente/{id}")
     * @Rest\View(serializerGroups={"cliente"}, serializerEnableMaxDepthChecks=true)
     */
    public function RemoveCliente(ClienteRepository $repository, Request $request, $id)
    {
        $cliente = $repository->find($id);
        return $repository->remove($cliente, true);
    }
}
