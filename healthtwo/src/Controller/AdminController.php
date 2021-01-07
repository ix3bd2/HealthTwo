<?php


namespace App\Controller;


use App\Entity\Medicijnen;

use App\form\MedicijnType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/medicijn",name="medicijn")
     */
    public function CrudMedicijn(){
        $rep = $this->getDoctrine()->getRepository((Medicijnen::class));
        $medicijn= $rep->findAll();

        return $this->render('medicijnCrud/medicijnCrud.html.twig',[
            'Medicijn'=>$medicijn,

        ]);
    }
    /**
     * @Route("/admin/medicijn/new",name="add")
     */
    public function add(Request $request)
    {
        // create a medicijn
        $medicijn = new Medicijnen();

        $form = $this->createForm(MedicijnType::class, $medicijn);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();
            return $this->redirectToRoute('medicijn');
        }
        return $this->render('MedicijnAdmin/addMedicijn.html.twig',array('form'=>$form->createView(),'naam'=>'toevoegen'));


    }
    /**
     * @Route("/admin/medicijn/delete{id}", name="delete")
     */
    public function delete($id)
    {
        $em=$this->getDoctrine()->getManager();
        $medicijn= $this->getDoctrine()
            ->getRepository(Medicijnen::class)->find($id);
        $em->remove($medicijn);
        $em->flush();
        return $this->redirectToRoute('medicijn');
    }
    /**
     * @Route("/admin/medicijn/edit{id}", name="edit")
     */
    public function edit($id, Request $request)
    {
        $medicijn=$this->getDoctrine()
            ->getRepository(Medicijnen::class)
            ->find($id);
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();
            return $this->redirectToRoute('medicijn');
        }
        return $this->render('MedicijnAdmin/editMedicijn.html.twig',array('form'=>$form->createView(),'naam'=>'aanpassen'));
    }
}
