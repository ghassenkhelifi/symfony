<?php

namespace App\Controller;
use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\AuthorRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/author/{name}', name: 'app_author')]
    public function SHOWAuther($name): Response
    {
        return $this->render('author/index.html.twig', [
            'n' => $name,
        ]);
    }





    #[Route('/showlist', name: 'showlist')]
    public function list()
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/victor-hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
        );
          
            return $this->render('author/list.html.twig', ['authors' => $authors]);
    }




    #[Route('/authorDetails/{id}', name: 'gh')]
    public function authorDetails($id)
    {
        return $this->render('author/showAuther.html.twig', [
            'n' => $id,
        ]);
    }


    
    


    #[Route('/listAuthor', name: 'list_author')]
    public function flist(authorRepository $authorepository):Response
    {
            $list=$authorepository->findALL();
            return $this->render('author/listAuthor.html.twig',['authors'=>$list]);

    }




    #[Route('/AddStatique', name: 'Add_Statique')]
public function addstatiqu(AuthorRepository $repository): Response
{
    $author1 = new Author();
    $author1->setUsername("test");
    $author1->setEmail("test@gmail.com");

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($author1);
    $entityManager->flush();

    $list = $repository->findAll();

    return $this->render('author/listAuthor.html.twig', [
        'authors' => $list
    ]);
}











}
