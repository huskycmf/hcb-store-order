<?php
namespace HcbStoreOrder\Service\Collection;

use HcbStoreOrder\Entity\Order as OrderEntity;
use HcCore\Data\Collection\Entities\ByIdsInterface;
use HcCore\Service\CommandInterface;
use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class DeleteService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var ByIdsInterface
     */
    protected $data;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $response
     * @param ByIdsInterface $data
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $response,
                                ByIdsInterface $data)
    {
        $this->entityManager = $entityManager;
        $this->response = $response;
        $this->data = $data;
    }

    /**
     * @return Response
     */
    public function execute()
    {
        return $this->delete($this->data);
    }

    /**
     * @param \HcCore\Data\Collection\Entities\ByIdsInterface $postsToDelete
     * @return Response
     */
    protected  function delete(ByIdsInterface $ordersToDelete)
    {
        try {
            $this->entityManager->beginTransaction();
            $orderEntities = $ordersToDelete->getEntities();

            /* @var $orderEntities OrderEntity[] */
            foreach ($orderEntities as $orderEntity) {
                $this->entityManager->remove($orderEntity);
            }

            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->response->error($e->getMessage())->failed();
            return $this->response;
        }

        $this->response->success();
        return $this->response;
    }
}
