<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;

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
    public function pdf(){
	    // Instantiate Dompdf with our options
	    $dompdf = new Dompdf();

	    // Retrieve the HTML generated in our twig file
	    // $html = file_get_contents('eleves/index.html.twig');

	    // Load HTML to Dompdf
	    $dompdf->loadHtml('helloWorld');

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
