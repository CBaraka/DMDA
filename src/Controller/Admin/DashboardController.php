<?php

namespace App\Controller\Admin;

use App\Entity\AdhesionParticuliers;
use App\Entity\Contact;
use App\Entity\DescAsso;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\DescAssoRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;

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
        yield MenuItem::linkToCrud('Description','fa fa-pencil-square-o',DescAsso::class);
        yield MenuItem::linkToCrud('Adhesion','fa fa-check-square-o',AdhesionParticuliers::class);
        yield MenuItem::linkToCrud('Contact','fa fa-check-square-o',Contact::class);
        yield MenuItem::linkToCrud('Utilisateurs','fa fa-users',User::class);
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {
      return parent::configureUserMenu($user)
      ->setName($user->getUsername())
      //->setAvatarUrl('')
      ->setGravatarEmail($user->getUsername())
      ->displayUserAvatar(true)
       ;
    }
}
