<?php

namespace App\Controller;

use App\Entity\TypeCuisine;
use App\Form\TypeCuisineType;
use App\Repository\TypeCuisineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/cuisine")
 */
class TypeCuisineController extends AbstractController
{
    /**
     * @Route("/", name="type_cuisine_index", methods={"GET"})
     */
    public function index(TypeCuisineRepository $typeCuisineRepository): Response
    {
        return $this->render('type_cuisine/index.html.twig', [
            'type_cuisines' => $typeCuisineRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_cuisine_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeCuisine = new TypeCuisine();
        $form = $this->createForm(TypeCuisineType::class, $typeCuisine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeCuisine);
            $entityManager->flush();

            return $this->redirectToRoute('type_cuisine_index');
        }

        return $this->render('type_cuisine/new.html.twig', [
            'type_cuisine' => $typeCuisine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_cuisine_show", methods={"GET"})
     */
    public function show(TypeCuisine $typeCuisine): Response
    {
        return $this->render('type_cuisine/show.html.twig', [
            'type_cuisine' => $typeCuisine,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_cuisine_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeCuisine $typeCuisine): Response
    {
        $form = $this->createForm(TypeCuisineType::class, $typeCuisine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_cuisine_index');
        }

        return $this->render('type_cuisine/edit.html.twig', [
            'type_cuisine' => $typeCuisine,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_cuisine_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeCuisine $typeCuisine): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeCuisine->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeCuisine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_cuisine_index');
    }
}
