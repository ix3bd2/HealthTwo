<?php


namespace App\Controller;


use App\Entity\Medicijnen;

use App\Entity\Recept;
use App\Form\MedicijnType;
use App\Form\ReceptType;
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
    public function CrudMedicijn()
    {
        $rep = $this->getDoctrine()->getRepository((Medicijnen::class));
        $medicijn = $rep->findAll();

        return $this->render('medicijnCrud/medicijnCrud.html.twig', [
            'Medicijn' => $medicijn,

        ]);
    }

    /**
     * @Route("/admin/medicijn/new",name="add")
     */
    public function add(Request $request)
    {
        $medicijn = new Medicijnen();
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();
            $this->addFlash(
                'success',
                'medicijn toegevoegd!'
            );
            return $this->redirectToRoute('medicijn');
        }
        return $this->render('MedicijnAdmin/addMedicijn.html.twig', array('form' => $form->createView(), 'naam' => 'toevoegen'));


    }

    /**
     * @Route("/admin/medicijn/delete{id}", name="delete")
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $medicijn = $this->getDoctrine()
            ->getRepository(Medicijnen::class)->find($id);
        $em->remove($medicijn);
        $em->flush();
        $this->addFlash(
            'success',
            'medicijn is verwijderd !'
        );
        return $this->redirectToRoute('medicijn');
    }

    /**
     * @Route("/admin/medicijn/edit/{id}", name="edit")
     */
    public function edit($id, Request $request)
    {
        $medicijn = $this->getDoctrine()
            ->getRepository(Medicijnen::class)
            ->find($id);
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicijn);
            $em->flush();
            $this->addFlash(
                'success',
                'medicijn is gewijzigd !'
            );
            return $this->redirectToRoute('medicijn');
        }
        return $this->render('MedicijnAdmin/editMedicijn.html.twig', array('form' => $form->createView(), 'naam' => 'aanpassen'));
    }

    /**
     * @Route("/recept", name="recept")
     */
    public function index(): Response
    {
        $rep = $this->getDoctrine()->getRepository((Recept::class));
        $recept = $rep->findAll();
        return $this->render('recept/index.html.twig', [
            'recepten' => $recept,
        ]);

    }
    /**
     * @Route("/admin/medicijn/newRecept",name="addRecept")
     */
    public function addRecept(Request $request)
    {
        $recept = new Recept();
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recept);
            $em->flush();
            $this->addFlash(
                'success',
                'Recept toegevoegd!'
            );
            return $this->redirectToRoute('recept');
        }
        return $this->render('recept/addRecept.html.twig', array('form' => $form->createView(), 'naam' => 'toevoegen'));


    }
    /**
     * /admin/medicijn/edit{id} editRecept1
 * @Route("/admin/medicijn/editRecept/{id}", name="editRecept")
 */
    public function editRecept($id, Request $request)
    {
        $recept = $this->getDoctrine()
            ->getRepository(Recept::class)
            ->find($id);
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recept);
            $em->flush();
            $this->addFlash(
                'success',
                'Recept is gewijzigd !'
            );
            return $this->redirectToRoute('recept');
        }
        return $this->render('recept/editRecept.html.twig', array('form' => $form->createView(),));
    }
    /**
     * @Route("/admin/medicijn/deleteRecept/{id}", name="deleteRecept")
     */
    public function deleteRecept($id)
    {
        $em = $this->getDoctrine()->getManager();
        $recept = $this->getDoctrine()
            ->getRepository(Recept::class)->find($id);
        $em->remove($recept);
        $em->flush();
        $this->addFlash(
            'success',
            'Recept is verwijderd !'
        );
        return $this->redirectToRoute('recept');
    }
}
