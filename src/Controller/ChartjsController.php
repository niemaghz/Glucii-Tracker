<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\PatientSuiviRepository;
use App\Entity\Patient;
use Symfony\Component\Security\Core\User\UserInterface;

class ChartjsController extends AbstractController
{
    /**
     * @Route("/chartjs", name="chartjs")
     */
    public function index(PatientSuiviRepository $patientSuiviRepository, ChartBuilderInterface $chartBuilder, UserInterface $userInterface): Response
    {
        // $data = $patientSuiviRepository->findAll();
        $data = $patientSuiviRepository->QteByDay($userInterface->getId());
        $labels = [];
        $datas = [];

        foreach ($data as $x) {

            $labels[] = $x['Day'];
            $datas[] = $x['Qte'];
        }

        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Doses insuline',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $datas,
                ],
            ],
        ]);
        /*    $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 1,
                    'suggestedMax' => 30,
                ],
            ],
        ]);
*/

        return $this->render('chartjs/index.html.twig', [
            'controller_name' => 'ChartjsController',
            'chart' => $chart,
        ]);
    }
}
