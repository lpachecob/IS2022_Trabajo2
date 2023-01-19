<?php

namespace App\Controller\Api;

use App\Entity\Venta;
use App\Repository\ClienteRepository;
use App\Repository\VentaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class VentaController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/ventas")
     * @Rest\View(serializerGroups={"venta"}, serializerEnableMaxDepthChecks=true)
     */
    public function getVentas(VentaRepository $repository)
    {
        return $repository->findAll() != null ? $repository->findAll() : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontrarón ventas",
        ], 400);
    }
    /**
     * @Rest\Get(path="/venta/{id}")
     * @Rest\View(serializerGroups={"venta"}, serializerEnableMaxDepthChecks=true)
     */
    public function getVenta(VentaRepository $repository, $id)
    {

        return $repository->find($id) != null ? $repository->find($id) : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontro el venta con id: $id",
        ], 400);
    }
    /**
     * @Rest\Post(path="/venta/")
     * @Rest\View(serializerGroups={"venta"}, serializerEnableMaxDepthChecks=true)
     */
    public function createVenta(VentaRepository $repository, ClienteRepository $clienteRepository, Request $request)
    {
        $parameters = json_decode($request->getContent(), true);

        $venta = new Venta();
        $venta->setCliente(isset($parameters['cliente']) ? $parameters['cliente'] : intval(null));
        if (
            empty($venta->getCliente() != null)
        ) {
            $error =
                ($venta->getCliente() == null ? 'El Campo de cliente está vacío' : '');
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => $error,
            ], 400);
        }
        $cliente = $clienteRepository->find($venta->getCliente());
        if ($cliente === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => 'El cliente no existe',
            ], 400);
        }
        $venta->setCorrelativoDeLaVenta(uniqid());
        $venta->setFecha(date_format(date_create(), 'Y-m-d H:i:s'));
        $venta->setConjuntoDeDetalleDeProducto([]);
        $venta->setMontoTotalDeLaVenta(0);
        return $repository->save($venta, true);
    }
    /**
     * @Rest\Post(path="/venta/{id}")
     * @Rest\View(serializerGroups={"venta"}, serializerEnableMaxDepthChecks=true)
     */
    public function updateVenta(VentaRepository $repository, ClienteRepository $clienteRepository, Request $request, $id)
    {
        $parameters = json_decode($request->getContent(), true);
        $venta = $repository->find($id);
        $cliente = $clienteRepository->find($parameters['cliente']);
        if ($cliente === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => 'El cliente no existe',
            ], 400);
        }
        $venta->setCliente(isset($parameters['cliente']) ? $parameters['cliente'] : $venta->getCliente());
        return $repository->save($venta, true);
    }
    /**
     * @Rest\Delete(path="/venta/{id}")
     * @Rest\View(serializerGroups={"venta"}, serializerEnableMaxDepthChecks=true)
     */
    public function RemoveVenta(VentaRepository $repository, Request $request, $id)
    {
        $venta = $repository->find($id);
        return $repository->remove($venta, true);
    }
}
