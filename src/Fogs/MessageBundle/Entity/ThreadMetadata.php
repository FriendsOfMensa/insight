<?php

namespace Fogs\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\ThreadMetadata as BaseThreadMetadata;
use FOS\MessageBundle\Model\ThreadInterface;
use FOS\MessageBundle\Model\ParticipantInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_thread_metadata")
 */
class ThreadMetadata extends BaseThreadMetadata
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Fogs\MessageBundle\Entity\Thread", inversedBy="metadata")
	 */
	protected $thread;

	/**
	 * @ORM\ManyToOne(targetEntity="Fogs\UserBundle\Entity\User")
	 */
	protected $participant;

	public function setThread(ThreadInterface $thread) {
		$this->thread = $thread;
	}

	public function setParticipant(ParticipantInterface $participant) {
		$this->participant = $participant;
		return $this;
	}

}