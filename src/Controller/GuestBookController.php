<?php

namespace App\Controller;

use App\Entity\GuestBook;
use App\Form\GuestBookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestBookController extends AbstractController
{
    /**
     * @Route("/", name="guest_book_index", methods={"GET"})
     */
    public function index(): Response
    {
        $guestBooks = $this->getDoctrine()
            ->getRepository(GuestBook::class)
            ->findAll();

        return $this->render('guest_book/index.html.twig', [
            'guest_books' => $guestBooks,
        ]);
    }

    /**
     * @Route("/new", name="guest_book_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $guestBook = new GuestBook();

        $form = $this->createForm(GuestBookType::class, $guestBook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guestBook->setIp($request->getClientIp());
            $guestBook->setBrowser($_SERVER['HTTP_USER_AGENT']);

            $entityManager->persist($guestBook);
            $entityManager->flush();

            return $this->redirectToRoute('guest_book_index');
        }

        return $this->render('guest_book/new.html.twig', [
            'guest_book' => $guestBook,
            'form' => $form->createView(),
        ]);
    }
}
