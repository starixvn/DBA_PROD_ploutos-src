<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paywalodeposits
 *
 * @ORM\Table(name="PaywaloDeposits")
 * @ORM\Entity
 */
class Paywalodeposits
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
     * @var integer
     *
     * @ORM\Column(name="PlayerProfileId", type="bigint", nullable=false)
     */
    private $playerprofileid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="UserAccountNo", type="string", length=50, nullable=true)
     */
    private $useraccountno;

    /**
     * @var string
     *
     * @ORM\Column(name="UserName", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @var integer
     *
     * @ORM\Column(name="Amount", type="bigint", nullable=false)
     */
    private $amount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="TransactionNumber", type="string", length=50, nullable=true)
     */
    private $transactionnumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TransactionDate", type="datetime", nullable=true)
     */
    private $transactiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderNumber", type="string", length=50, nullable=true)
     */
    private $ordernumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OrderDate", type="datetime", nullable=true)
     */
    private $orderdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="BankId", type="bigint", nullable=false)
     */
    private $bankid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="WalletDepositId", type="bigint", nullable=false)
     */
    private $walletdepositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="WalletDepositNo", type="string", length=50, nullable=true)
     */
    private $walletdepositno;

    /**
     * @var integer
     *
     * @ORM\Column(name="ActualDepositAmount", type="bigint", nullable=false)
     */
    private $actualdepositamount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StatusDate", type="datetime", nullable=true)
     */
    private $statusdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="UDAAmount", type="bigint", nullable=false)
     */
    private $udaamount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Notes", type="string", length=200, nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=50, nullable=true)
     */
    private $createdbyid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=50, nullable=true)
     */
    private $modifiedbyid = '0';

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
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=false)
     */
    private $activerecord = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="PaywaloPaymentGatewayType", type="integer", nullable=false)
     */
    private $paywalopaymentgatewaytype = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Platform", type="string", length=10, nullable=true)
     */
    private $platform;



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
     * Set playerprofileid
     *
     * @param integer $playerprofileid
     *
     * @return Paywalodeposits
     */
    public function setPlayerprofileid($playerprofileid)
    {
        $this->playerprofileid = $playerprofileid;

        return $this;
    }

    /**
     * Get playerprofileid
     *
     * @return integer
     */
    public function getPlayerprofileid()
    {
        return $this->playerprofileid;
    }

    /**
     * Set useraccountno
     *
     * @param string $useraccountno
     *
     * @return Paywalodeposits
     */
    public function setUseraccountno($useraccountno)
    {
        $this->useraccountno = $useraccountno;

        return $this;
    }

    /**
     * Get useraccountno
     *
     * @return string
     */
    public function getUseraccountno()
    {
        return $this->useraccountno;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Paywalodeposits
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Paywalodeposits
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transactionnumber
     *
     * @param string $transactionnumber
     *
     * @return Paywalodeposits
     */
    public function setTransactionnumber($transactionnumber)
    {
        $this->transactionnumber = $transactionnumber;

        return $this;
    }

    /**
     * Get transactionnumber
     *
     * @return string
     */
    public function getTransactionnumber()
    {
        return $this->transactionnumber;
    }

    /**
     * Set transactiondate
     *
     * @param \DateTime $transactiondate
     *
     * @return Paywalodeposits
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
     * Set ordernumber
     *
     * @param string $ordernumber
     *
     * @return Paywalodeposits
     */
    public function setOrdernumber($ordernumber)
    {
        $this->ordernumber = $ordernumber;

        return $this;
    }

    /**
     * Get ordernumber
     *
     * @return string
     */
    public function getOrdernumber()
    {
        return $this->ordernumber;
    }

    /**
     * Set orderdate
     *
     * @param \DateTime $orderdate
     *
     * @return Paywalodeposits
     */
    public function setOrderdate($orderdate)
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    /**
     * Get orderdate
     *
     * @return \DateTime
     */
    public function getOrderdate()
    {
        return $this->orderdate;
    }

    /**
     * Set bankid
     *
     * @param integer $bankid
     *
     * @return Paywalodeposits
     */
    public function setBankid($bankid)
    {
        $this->bankid = $bankid;

        return $this;
    }

    /**
     * Get bankid
     *
     * @return integer
     */
    public function getBankid()
    {
        return $this->bankid;
    }

    /**
     * Set walletdepositid
     *
     * @param integer $walletdepositid
     *
     * @return Paywalodeposits
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
     * Set walletdepositno
     *
     * @param string $walletdepositno
     *
     * @return Paywalodeposits
     */
    public function setWalletdepositno($walletdepositno)
    {
        $this->walletdepositno = $walletdepositno;

        return $this;
    }

    /**
     * Get walletdepositno
     *
     * @return string
     */
    public function getWalletdepositno()
    {
        return $this->walletdepositno;
    }

    /**
     * Set actualdepositamount
     *
     * @param integer $actualdepositamount
     *
     * @return Paywalodeposits
     */
    public function setActualdepositamount($actualdepositamount)
    {
        $this->actualdepositamount = $actualdepositamount;

        return $this;
    }

    /**
     * Get actualdepositamount
     *
     * @return integer
     */
    public function getActualdepositamount()
    {
        return $this->actualdepositamount;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Paywalodeposits
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statusdate
     *
     * @param \DateTime $statusdate
     *
     * @return Paywalodeposits
     */
    public function setStatusdate($statusdate)
    {
        $this->statusdate = $statusdate;

        return $this;
    }

    /**
     * Get statusdate
     *
     * @return \DateTime
     */
    public function getStatusdate()
    {
        return $this->statusdate;
    }

    /**
     * Set udaamount
     *
     * @param integer $udaamount
     *
     * @return Paywalodeposits
     */
    public function setUdaamount($udaamount)
    {
        $this->udaamount = $udaamount;

        return $this;
    }

    /**
     * Get udaamount
     *
     * @return integer
     */
    public function getUdaamount()
    {
        return $this->udaamount;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Paywalodeposits
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Paywalodeposits
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
     * @return Paywalodeposits
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
     * @return Paywalodeposits
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
     * @return Paywalodeposits
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
     * @return Paywalodeposits
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

    /**
     * Set paywalopaymentgatewaytype
     *
     * @param integer $paywalopaymentgatewaytype
     *
     * @return Paywalodeposits
     */
    public function setPaywalopaymentgatewaytype($paywalopaymentgatewaytype)
    {
        $this->paywalopaymentgatewaytype = $paywalopaymentgatewaytype;

        return $this;
    }

    /**
     * Get paywalopaymentgatewaytype
     *
     * @return integer
     */
    public function getPaywalopaymentgatewaytype()
    {
        return $this->paywalopaymentgatewaytype;
    }

    /**
     * Set platform
     *
     * @param string $platform
     *
     * @return Paywalodeposits
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
