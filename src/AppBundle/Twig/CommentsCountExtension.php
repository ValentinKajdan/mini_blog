<?php
namespace AppBundle\Twig;
use AppBundle\Services\CommentsCountService;
class CommentsCountExtension extends \Twig_Extension
{
    /**
     * @var CommentsCountService
     */
    private $CommentsCountService;
    /**
     * @param CommentsCountService $CommentsCountService
     */
    public function __construct(CommentsCountService $CommentsCountService)
    {
        $this->CommentsCountService = $CommentsCountService;
    }
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'get_total_comments',
                [$this, 'getTotalComments']
            )
        ];
    }
    public function getTotalComments($idArt)
    {
        return $this->CommentsCountService->getTotalComments($idArt);
    }
}
