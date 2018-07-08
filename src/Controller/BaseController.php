<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function save($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
    }

    public function delete($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();
    }
}
