<?php

namespace App\Controller\Api;

use App\Entity\Persona;
use App\Repository\PersonaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonaController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/personas")
     * @Rest\View(serializerGroups={"persona"}, serializerEnableMaxDepthChecks=true)
     */
    public function getPersonas(PersonaRepository $repository)
    {
        return $repository->findAll();
    }
    /**
     * @Rest\Get(path="/persona/{id}")
     * @Rest\View(serializerGroups={"persona"}, serializerEnableMaxDepthChecks=true)
     */
    public function getPersona(PersonaRepository $repository, $id)
    {
        return $repository->find($id);
    }
    /**
     * @Rest\Post(path="/persona/")
     * @Rest\View(serializerGroups={"persona"}, serializerEnableMaxDepthChecks=true)
     */
    public function createPersona(PersonaRepository $repository, Request $request)
    {
        $parameters = json_decode($request->getContent(), true);
        $persona = $repository->findBy(['dni' => $parameters['dni']]);
        if (!!$persona) {
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => 'La persona con DNI: ' . $parameters['dni'] . ', Ya existe.',
            ], 400);;
        }

        $persona = new Persona();
        $persona->setDni(isset($parameters['dni']) ? $parameters['dni'] : '');
        $persona->setNombre(isset($parameters['nombre']) ? $parameters['nombre'] : '');
        $persona->setApellidos(isset($parameters['apellidos']) ? $parameters['apellidos'] : '');
        $persona->setFechaDelRegistro(date_format(date_create(), 'Y-m-d H:i:s'));
        $persona->setEdad(isset($parameters['edad']) ? $parameters['edad'] : null);
        $persona->setPeso(isset($parameters['peso']) ? $parameters['peso'] : null);
        $persona->setTalla(isset($parameters['talla']) ? $parameters['talla'] : null);

        if (
            empty($persona->getDni()) ||
            empty($persona->getNombre()) ||
            empty($persona->getApellidos())
        ) {
            $error =
                (empty($persona->getDni()) ? 'El Campo de dni está vacío, ' : '') .
                (empty($persona->getNombre()) ? 'El Campo de nombre está vacío, ' : '') .
                (empty($persona->getApellidos()) ? 'El Campo de apellido está vacío' : '');
            return new JsonResponse([
                'success' => false,
                'code'    => 400,
                'message' => $error,
            ], 400);;;
        }

        return $repository->save($persona, true);
    }
    /**
     * @Rest\Post(path="/persona/{id}")
     * @Rest\View(serializerGroups={"persona"}, serializerEnableMaxDepthChecks=true)
     */
    public function updatePersona(PersonaRepository $repository, Request $request, $id)
    {
        $parameters = json_decode($request->getContent(), true);
        $persona = $repository->find($id);
        $persona->setDni(isset($parameters['dni']) ? $parameters['dni'] : $persona->getDni());
        $persona->setNombre(isset($parameters['nombre']) ? $parameters['nombre'] : $persona->getNombre());
        $persona->setApellidos(isset($parameters['apellidos']) ? $parameters['apellidos'] : $persona->getApellidos());
        $persona->setEdad(isset($parameters['edad']) ? $parameters['edad'] : $persona->getEdad());
        $persona->setPeso(isset($parameters['peso']) ? $parameters['peso'] : $persona->getPeso());
        $persona->setTalla(isset($parameters['talla']) ? $parameters['talla'] : $persona->getTalla());

        return $repository->save($persona, true);
    }
    /**
     * @Rest\Delete(path="/persona/{id}")
     * @Rest\View(serializerGroups={"persona"}, serializerEnableMaxDepthChecks=true)
     */
    public function RemovePersona(PersonaRepository $repository, Request $request, $id)
    {
        $persona = $repository->find($id);
        return $repository->remove($persona, true);
    }
}
