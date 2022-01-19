<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;
use App\Entity\PatientSuivi;
use App\Form\RatioType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Monolog\DateTimeImmutable;


class RatioController extends AbstractController
{
    private $tokenStorage;
    /**
     * @Route("/ratio", name="ratio")
     */
    public function InsulineDose(Request $request, EntityManagerInterface $entityManager): Response
    {
        $patientsuivi = new PatientSuivi();
        $form = $this->createForm(RatioType::class, $patientsuivi);
        $form->handleRequest($request);
        $insuline = 0;
        if ($form->isSubmitted() && $form->isValid()) {

            $patient = $this->getUser();
            $patientsuivi->setPatient($patient);

            $patientsuivi->setCreatedAt(new DateTimeImmutable('now'));
            $patientsuivi->setInsuline($this->calculate($patientsuivi->getGlycemie(), $patientsuivi->getGlucide()));

            $insuline = $patientsuivi->getInsuline();
            $entityManager->persist($patientsuivi);
            $entityManager->flush();
            return $this->render('ratio/index.html.twig', ['Ratio' => $form->createView(), 'insuline' => $insuline]);

            // do anything else you need here, like send an email

        }

        return $this->render('ratio/index.html.twig', [
            'Ratio' => $form->createView(), 'insuline' => $insuline
        ]);
    }
    public function calculate(float $glycemie, float $glucide)
    {

        if ($glycemie < 4) $e = -1;
        elseif ($glycemie >= 4 && $glycemie < 8) $e = 0;
        elseif ($glycemie >= 8 && $glycemie < 12) $e = 1;
        elseif ($glycemie >= 12 && $glycemie < 17) $e = 2;
        elseif ($glycemie >= 17) $e = 3;
        return ($glucide / 10) + $e;
    }
}
