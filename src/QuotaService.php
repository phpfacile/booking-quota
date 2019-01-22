<?php
namespace PHPFacile\Booking\Quota\Service;

abstract class QuotaService implements QuotaServiceInterface
{
    /**
     * Quotas for different pools (if no context is required)
     *
     * @var integer[] $quotas
     */
    protected $quotas = [];

    /**
     * Returns true if there is a quota for a given pool of item
     *
     * @param integer|string $poolId Id of the pool (of item that can be booked)
     *
     * @return boolean True if there is a quota for a given pool of item
     */
    public function isPoolWithQuota($poolId)
    {
        return true;
    }

    /**
     * Set quota for a given pool of bookable items assuming no context (ex:user profile) have
     * to be taken into account.
     *
     * @param integer|string $poolId Id of the pool (of item that can be booked)
     * @param integer        $quota  quota or null if no quota
     *
     * @return void
     */
    public function setPoolBasicQuota($poolId, $quota)
    {
        $this->quotas[$poolId] = $quota;
    }

    /**
     * Returns the quota set for a given pool of bookable items assuming no context (ex:user profile) have
     * to be taken into account.
     *
     * @param integer|string $poolId Id of the pool (of item that can be booked)
     *
     * @return quota or null if no quota
     */
    public function getPoolBasicQuota($poolId)
    {
        if (true === array_key_exists($poolId, $this->quotas)) {
            return $this->quotas[$poolId];
        }

        return null;
    }

    /**
     * Returns true if the quota is reached for a given pool of item
     * taking into account a context (ex: maybe there is a quota of children for a given show)
     *
     * @param integer|string $poolId  Id of the pool (of item that can be booked)
     * @param mixed          $context Context so as to be able to manage different quotas depending on user profile for example
     *
     * @return boolean True if the quota is reached
     */
    abstract public function isQuotaReached($poolId, $context = null);

    /**
     * Returns true if validating a given booking set (several bookings) would
     * lead to a quota limit overpassed
     *
     * @param integer|string $poolId       Id of the pool (of item that can be booked)
     * @param integer|string $bookingSetId Id of the booking set
     * @param mixed          $context      Context so as to be able to manage different quotas depending on user profile for example
     *
     * @return boolean True if the quota is reached
     */
    abstract public function isOverQuota($poolId, $bookingSetId, $context = null);

}
