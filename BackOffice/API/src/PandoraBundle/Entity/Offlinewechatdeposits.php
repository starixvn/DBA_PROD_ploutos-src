<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offlinewechatdeposits
 *
 * @ORM\Table(name="OfflineWechatDeposits", uniqueConstraints={@ORM\UniqueConstraint(name="TransactionNo", columns={"TransactionNo"})})
 * @ORM\Entity
 */
class Offlinewechatdeposits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerAccountNo", type="string", length=50, nullable=true)
     */
    private $playeraccountno;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerWechatAccountNo", type="string", length=50, nullable=true)
     */
    private $playerwechataccountno;

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNo", type="string", length=50, nullable=true)
     */
    private $transactionno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var float
     *
     * @ORM\Column(name="DepositAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $depositamount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="BonusCode", type="string", length=50, nullable=true)
     */
    private $bonuscode;

    /**
     * @var string
     *
     * @ORM\Column(name="OperatorBankAccountNo", type="string", length=50, nullable=true)
     */
    private $operatorbankaccountno;

    /**
     * @var integer
     *
     * @ORM\Column(name="OperatorBankAccountId", type="bigint", nullable=true)
     */
    private $operatorbankaccountid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=true)
     */
    private $walletdepositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=255, nullable=true)
     */
    private $createdbyid;

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=255, nullable=true)
     */
    private $modifiedbyid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $datemodified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=true)
     */
    private $activerecord = '1';



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set playeraccountno
     *
     * @param string $playeraccountno
     *
     * @return Offlinewechatdeposits
     */
    public function setPlayeraccountno($playeraccountno)
    {
        $this->playeraccountno = $playeraccountno;

        return $this;
    }

    /**
     * Get playeraccountno
     *
     * @return string
     */
    public function getPlayeraccountno()
    {
        return $this->playeraccountno;
    }

    /**
     * Set playerwechataccountno
     *
     * @param string $playerwechataccountno
     *
     * @return Offlinewechatdeposits
     */
    public function setPlayerwechataccountno($playerwechataccountno)
    {
        $this->playerwechataccountno = $playerwechataccountno;

        return $this;
    }

    /**
     * Get playerwechataccountno
     *
     * @return string
     */
    public function getPlayerwechataccountno()
    {
        return $this->playerwechataccountno;
    }

    /**
     * Set transactionno
     *
     * @param string $transactionno
     *
     * @return Offlinewechatdeposits
     */
    public function setTransactionno($transactionno)
    {
        $this->transactionno = $transactionno;

        return $this;
    }

    /**
     * Get transactionno
     *
     * @return string
     */
    public function getTransactionno()
    {
        return $this->transactionno;
    }

    /**
     * Set transactiondate
     *
     * @param \DateTime $transactiondate
     *
     * @return Offlinewechatdeposits
     */
    public function setTransactiondate($transactiondate)
    {
        $this->transactiondate = $transactiondate;

        return $this;
    }

    /**
     * Get transactiondate
     *
     * @return \DateTime
     */
    public function getTransactiondate()
    {
        return $this->transactiondate;
    }

    /**
     * Set depositamount
     *
     * @param float $depositamount
     *
     * @return Offlinewechatdeposits
     */
    public function setDepositamount($depositamount)
    {
        $this->depositamount = $depositamount;

        return $this;
    }

    /**
     * Get depositamount
     *
     * @return float
     */
    public function getDepositamount()
    {
        return $this->depositamount;
    }

    /**
     * Set bonuscode
     *
     * @param string $bonuscode
     *
     * @return Offlinewechatdeposits
     */
    public function setBonuscode($bonuscode)
    {
        $this->bonuscode = $bonuscode;

        return $this;
    }

    /**
     * Get bonuscode
     *
     * @return string
     */
    public function getBonuscode()
    {
        return $this->bonuscode;
    }

    /**
     * Set operatorbankaccountno
     *
     * @param string $operatorbankaccountno
     *
     * @return Offlinewechatdeposits
     */
    public function setOperatorbankaccountno($operatorbankaccountno)
    {
        $this->operatorbankaccountno = $operatorbankaccountno;

        return $this;
    }

    /**
     * Get operatorbankaccountno
     *
     * @return string
     */
    public function getOperatorbankaccountno()
    {
        return $this->operatorbankaccountno;
    }

    /**
     * Set operatorbankaccountid
     *
     * @param integer $operatorbankaccountid
     *
     * @return Offlinewechatdeposits
     */
    public function setOperatorbankaccountid($operatorbankaccountid)
    {
        $this->operatorbankaccountid = $operatorbankaccountid;

        return $this;
    }

    /**
     * Get operatorbankaccountid
     *
     * @return integer
     */
    public function getOperatorbankaccountid()
    {
        return $this->operatorbankaccountid;
    }

    /**
     * Set walletdepositid
     *
     * @param integer $walletdepositid
     *
     * @return Offlinewechatdeposits
     */
    public function setWalletdepositid($walletdepositid)
    {
        $this->walletdepositid = $walletdepositid;

        return $this;
    }

    /**
     * Get walletdepositid
     *
     * @return integer
     */
    public function getWalletdepositid()
    {
        return $this->walletdepositid;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Offlinewechatdeposits
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid
     *
     * @return string
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }

    /**
     * Set modifiedbyid
     *
     * @param string $modifiedbyid
     *
     * @return Offlinewechatdeposits
     */
    public function setModifiedbyid($modifiedbyid)
    {
        $this->modifiedbyid = $modifiedbyid;

        return $this;
    }

    /**
     * Get modifiedbyid
     *
     * @return string
     */
    public function getModifiedbyid()
    {
        return $this->modifiedbyid;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
     * @return Offlinewechatdeposits
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set datemodified
     *
     * @param \DateTime $datemodified
     *
     * @return Offlinewechatdeposits
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return \DateTime
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set activerecord
     *
     * @param boolean $activerecord
     *
     * @return Offlinewechatdeposits
     */
    public function setActiverecord($activerecord)
    {
        $this->activerecord = $activerecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiverecord()
    {
        return $this->activerecord;
    }
}
