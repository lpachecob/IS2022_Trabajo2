<?php

namespace App\Controller\Api;

use App\Entity\Producto;
use App\Repository\ProductoRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductoController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/productos")
     * @Rest\View(serializerGroups={"producto"}, serializerEnableMaxDepthChecks=true)
     */
    public function getProductos(ProductoRepository $repository)
    {
        return $repository->findAll()!== null ? $repository->findAll() : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontrarón productos",
        ], 400);
    }
    /**
     * @Rest\Get(path="/producto/{id}")
     * @Rest\View(serializerGroups={"producto"}, serializerEnableMaxDepthChecks=true)
     */
    public function getProducto(ProductoRepository $repository, $id)
    {

        return $repository->find($id) !== null ? $repository->find($id) : new JsonResponse([
            'success' => false,
            'code'    => 400,
            'message' => "No se encontro el producto con id: $id",
        ], 400);
    }
    /**
     * @Rest\Post(path="/producto/")
     * @Rest\View(serializerGroups={"producto"}, serializerEnableMaxDepthChecks=true)
     */
    public function createProducto(ProductoRepository $repository, Request $request)
    {
        $parameters = json_decode($request->getContent(), true);

        $producto = new Producto();
        $producto->setNombre(isset($parameters['nombre']) ? $parameters['nombre'] : '');
        $producto->setPrecio(isset($parameters['precio']) ? $parameters['precio'] : '');
        $producto->setStock(isset($parameters['stock']) ? $parameters['stock'] : '');
        if (
            empty($producto->getNombre()) ||
            empty($producto->getPrecio()) ||
            empty($producto->getStock())
        ) {
            $error =
                (empty($producto->getNombre()) ? 'El Campo de nombre está vacío, ' : '') .
                (empty($producto->getPrecio()) ? 'El Campo de precio está vacío, ' : '') .
                (empty($producto->getStock()) ? 'El Campo de stock está vacío' : '');
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => $error,
            ], 400);
        }

        return $repository->save($producto, true);
    }
    /**
     * @Rest\Post(path="/producto/{id}")
     * @Rest\View(serializerGroups={"producto"}, serializerEnableMaxDepthChecks=true)
     */
    public function updateProducto(ProductoRepository $repository, Request $request, $id)
    {
        $parameters = json_decode($request->getContent(), true);
        $producto = $repository->find($id);
        $producto->setNombre(isset($parameters['nombre']) ? $parameters['nombre'] : $producto->getNombre());
        $producto->setPrecio(isset($parameters['precio']) ? $parameters['precio'] : $producto->getPrecio());
        $producto->setStock(isset($parameters['stock']) ? $parameters['stock'] : $producto->getStock());


        return $repository->save($producto, true);
    }
    /**
     * @Rest\Delete(path="/producto/{id}")
     * @Rest\View(serializerGroups={"producto"}, serializerEnableMaxDepthChecks=true)
     */
    public function RemoveProducto(ProductoRepository $repository, Request $request, $id)
    {
        $producto = $repository->find($id);
        return $repository->remove($producto, true);
    }
}
