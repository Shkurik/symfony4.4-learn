<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/shkurik", name="shkurik")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $note = new Note();
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $em->persist($note);
            $em->flush();

            return $this->redirectToRoute('shkurik');
        }

        $notes = $em->getRepository(Note::class)->findAll();

        $date = date('d-m-Y');
        return $this->render('shkurik.html.twig', [
            'controller_name' => 'MainController',
            'date' => $date,
            'form' => $form->createView(),
            'notes' => $notes
        ]);
    }
}
