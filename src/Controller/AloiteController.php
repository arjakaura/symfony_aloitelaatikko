<?php

namespace App\Controller;

use App\Entity\Aloite;
use App\Form\AloiteFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AloiteController extends AbstractController {
    /**
     * @Route("/aloite", name="aloite_lista")
     */
     public function index() {
      //tulostaa kaikki aloitteet tietokannasta
      $aloitteet = $this->getDoctrine()->getRepository(Aloite::class)->findAll();
      //pyydetään näyttämään kaikki aloitteet
      return $this->render('aloite/index.html.twig',[
          'aloitteet' =>$aloitteet,
      ]);
  }

    /**
     * @Route("/aloite/uusi", name="aloite_uusi")
     */
    public function uusi(Request $request){
        //luodaan aloite olio
        $aloite = new Aloite();

        //luodaan lomake
        $form = $this->createForm(
            AloiteFormType::class,
            $aloite, [
                'action' => $this->generateUrl('aloite_uusi'),
                'attr'   => ['class' => 'form-signin']
            ]
     );
    

     //käsitellään lomakkeelta tulleet tiedot ja tallennetaan tietokantaan
        $form->handleRequest($request);
        if($form->isSubmitted()){
            //tallennetaan lomaktiedot muuttujaan
            $aloite = $form->getData();
            //talletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aloite);
            $entityManager->flush();

            //kutsutaan index-kontrolleria
            return $this->redirectToRoute('aloite_lista');
        }

            //pyydetään näyttämään lomake
            return $this->render('aloite/uusi.html.twig',[
                'form1' => $form->createView()
            ]);

    }

    /**
    * @Route("/aloite/nayta/{id}", name="aloite_nayta")
    */
     public function nayta($id){
        $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);

            return $this->render('aloite/nayta.html.twig', [
                'aloite' => $aloite,
            ]);
        }


    /**
     * @Route("/aloite/muokkaa/{id}", name="aloite_muokkaa")
     */
    public function muokkaa(Request $request, $id){
        //luo aloite olion ja palauttaa sen
        $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);

        //luodaan lomake
        $form = $this->createForm(
            AloiteFormType::class,
            $aloite, [
                'attr' => ['class' => 'form-signin']
            ]
         );

    
         //käsitellään lomakkeelta tulleet tiedot ja tallennetaan tietokantaan
         $form->handleRequest($request);
         if($form->isSubmitted()){
             //talletetaan lomaketiedot muuttujaan
             $aloite = $form->getData();
             //talletetaan tietokantaan
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->flush();

             //kutsutaan index-kontrolleria
             return $this->redirectToRoute('aloite_lista');

         }

            return $this->render('aloite/muokkaa.html.twig',[
                'form1' =>$form->createView()
            ]);
        }

    /**
     * @Route("/aloite/poista/{id}", name="aloite_poista")
     */

     public function poista(Request $request, $id){
         //luon aloite onlion ja palautaa sen tiedoilla täytettynä
    $aloite = $this->getDoctrine()->getRepository(Aloite::class)->find($id);

        //poisetaan aloite tietokannasta
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($aloite);
    $entityManager->flush();

    return $this->redirectToRoute('aloite_lista');
    //returm $this->render('aloite/poista.html.twig');

     }

  }



?>