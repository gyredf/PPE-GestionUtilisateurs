<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Repository\ElevesRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

	/**
     * @Route("/pdftest", name="default_pdf")
     */
    public function pdf(ElevesRepository $elevesRepository){
	    // Instantiate Dompdf with our options
		$dompdf = new Dompdf();

	    // Retrieve the HTML generated in our twig file
		// $html = file_get_contents('eleves/index.html.twig');
		
		$response = $this->render('eleves/table_liste_eleve.html.twig', [
            'eleves' => $elevesRepository->findAll(),
        ]);

	    // Load HTML to Dompdf
	    $dompdf->loadHtml($response->getContent());

	    // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
	    $dompdf->setPaper('A4', 'portrait');

	    // Render the HTML as PDF
	    $dompdf->render();

	    $resolv = $dompdf->stream("mypdf.pdf", [
        	"Attachment" => false
	    ]);


	    // return $this->render('default/index.html.twig', [
     //        'controller_name' => 'DefaultController',
     //    ]);



	}

}
