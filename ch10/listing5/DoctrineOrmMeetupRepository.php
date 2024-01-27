<?php

/*
listing 10.5: Example of a write model repository which implements the adjoined interface.
*/

namespace Infrastructure\Persistence\DoctrineOrm;

use Doctrine\ORM\EntityManager;
use Domain\Model\Meetup\Meetup;
use Domain\Model\Meetup\MeetupId;
use Ramsey\Uuid\UuidFactoryInterface;

final class DoctrineOrmMeetupRepository implements MeetupRepository
{
	public function __construct(
		private EntityManager $entityManager,
		private UuidFactoryInterface $uuidFactory
	) {}
	
	public function save(Meetup $meetup): void
	{
		$this->entityManager->persist($meetup);

		$this->entityManager->flush($meetup);
	}
	
	public function nextIdentity(): MeetupId
	{

		return (new MeetupId())->fromString($this->uuidFactory->uuid4()->toString());
	}

	// ...
}