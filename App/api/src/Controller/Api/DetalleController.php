<?php

namespace App\Controller\Api;

use App\Entity\Detalle;
use App\Repository\DetalleRepository;
use App\Repository\ProductoRepository;
use App\Repository\VentaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class DetalleController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/detalles")
     * @Rest\View(serializerGroups={"detalle"}, serializerEnableMaxDepthChecks=true)
     */
    public function getDetalles(DetalleRepository $repository)
    {
        return $repository->findAll() != null ? $repository->findAll() : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontrarón detalles",
        ], 400);;;
    }
    /**
     * @Rest\Get(path="/detalle/{id}")
     * @Rest\View(serializerGroups={"detalle"}, serializerEnableMaxDepthChecks=true)
     */
    public function getDetalle(DetalleRepository $repository, $id)
    {
        return $repository->find($id) != null ? $repository->find($id) : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontro el detalle con id: $id",
        ], 400);
    }
    /**
     * @Rest\Post(path="/detalle/")
     * @Rest\View(serializerGroups={"detalle"}, serializerEnableMaxDepthChecks=true)
     */
    public function createDetalle(
        DetalleRepository $repository,
        ProductoRepository $productoRepository,
        VentaRepository $ventaRepository,
        Request $request
    ) {
        $parameters = json_decode($request->getContent(), true);

        $detalle = new Detalle();
        $detalle->setProducto(isset($parameters['producto']) ? $parameters['producto'] : '');
        $detalle->setCantidad(isset($parameters['cantidad']) ? $parameters['cantidad'] : '');
        if (
            empty($detalle->getProducto()) ||
            empty($detalle->getCantidad())
        ) {
            $error =
                (empty($detalle->getProducto()) ? 'El Campo de producto está vacío, ' : '') .
                (empty($detalle->getCantidad()) ? 'El Campo de cantidad está vacío, ' : '');
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => $error,
            ], 400);
        }

        $producto = $productoRepository->find($detalle->getProducto());

        if ($producto === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "No se encontro el producto ingresado",
            ], 400);
        }

        if ($producto->getStock() - $detalle->getCantidad() < 0) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "La cantidad ingresada es mayor que el stock disponible",
            ], 400);
        }

        $producto->setStock($producto->getStock() - $detalle->getCantidad());

        $detalle->setSubtotal($producto->getPrecio() * $detalle->getCantidad());

        $venta = $ventaRepository->find($parameters['venta']);
        if ($venta == null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => 'La venta no existe',
            ], 400);
        }
        $detalleGuardado = $repository->save($detalle, true);

        $ventaArray = $venta->getConjuntoDeDetalleDeProducto();

        array_push($ventaArray, $detalleGuardado->getId());
        $venta->setConjuntoDeDetalleDeProducto($ventaArray);
        $venta->setMontoTotalDeLaVenta($venta->getMontoTotalDeLaVenta() + $detalle->getSubtotal());
        return [
            'Detalle' => $detalleGuardado,
            'Producto' => $productoRepository->save($producto, true),
            'Venta' => $ventaRepository->save($venta)
        ];
    }
    /**
     * @Rest\Post(path="/detalle/{id}")
     * @Rest\View(serializerGroups={"detalle"}, serializerEnableMaxDepthChecks=true)
     */
    public function updateDetalle(
        DetalleRepository $repository,
        ProductoRepository $productoRepository,
        VentaRepository $ventaRepository,
        Request $request,
        $id
    ) {
        $parameters = json_decode($request->getContent(), true);

        $detalle = $repository->find($id);
        if ($detalle === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "Detalle no encontrado",
            ], 400);
        }

        $producto = $productoRepository->find($detalle->getProducto());
        if ($producto === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "Producto no encontrado",
            ], 400);
        }
        $venta = $ventaRepository->find($parameters['venta']);
        $venta->setMontoTotalDeLaVenta($venta->getMontoTotalDeLaVenta() - $detalle->getSubtotal());
        $producto->setStock($producto->getStock() + ($detalle->getCantidad() - $parameters['cantidad']));

        $detalle->setCantidad(isset($parameters['cantidad']) ? $parameters['cantidad'] : $detalle->getCantidad());
        $detalle->setSubtotal($producto->getPrecio() * $detalle->getCantidad());

        $venta->setMontoTotalDeLaVenta($venta->getMontoTotalDeLaVenta() + $detalle->getSubtotal());

        return [
            'Detalle' => $repository->save($detalle, true),
            'Producto' => $productoRepository->save($producto, true),
            'Venta' => $ventaRepository->save($venta, true)
        ];
    }
    /**
     * @Rest\Delete(path="/detalle/{id}")
     * @Rest\View(serializerGroups={"detalle"}, serializerEnableMaxDepthChecks=true)
     */
    public function RemoveDetalle(
        DetalleRepository $repository,
        ProductoRepository $productoRepository,
        VentaRepository $ventaRepository,
        Request $request,
        $id
    ) {
        $detalle = $repository->find($id);
        if ($detalle === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "Detalle no encontrado",
            ], 400);
        }

        $producto = $productoRepository->find($detalle->getProducto());
        if ($producto === null) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => "Producto no encontrado",
            ], 400);
        }
        $producto->setStock($producto->getStock() + $detalle->getCantidad());
        $parameters = json_decode($request->getContent(), true);
        $venta = $ventaRepository->find($parameters['venta']);
        $conjuntoDetalle = $venta->getConjuntoDeDetalleDeProducto();
        if (($key = array_search($id, $conjuntoDetalle)) !== false) {
            unset($conjuntoDetalle[$key]);
        }
        $venta->setConjuntoDeDetalleDeProducto($conjuntoDetalle);
        $venta->setMontoTotalDeLaVenta($venta->getMontoTotalDeLaVenta() - $detalle->getSubtotal());
        return [
            'Detalle' => $repository->remove($detalle, true),
            'Producto' => $productoRepository->save($producto, true),
            'Venta' => $ventaRepository->save($venta, true)
        ];
    }
}
