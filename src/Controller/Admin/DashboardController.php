<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use App\Repository\DescAssoRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    protected $descAssocRepository;
    protected $userRepository;

    public function __construct( 
        DescAssoRepository $descAssocRepository,
        UserRepository $userRepository
    )
    {
        $this->descAssocRepository=$descAssocRepository;
        $this->userRepository =$userRepository;
    }


    /**
     * @Route("/admin_d976m", name="admin")
     * 
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundles/welcome.html.twig',[
            'descAsso'=>$this->descAssocRepository->findAll(),
            'user'=>$this->userRepository->findAll()
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DMDA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
