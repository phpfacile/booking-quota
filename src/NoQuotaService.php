<?php
namespace PHPFacile\Booking\Quota\Service;

class NoQuotaService extends QuotaService
{
    /**
     * Returns true if there is a quota for a given pool of item
     *
     * @param integer|string $poolId Id of the pool (of item that can be booked)
     *
     * @return boolean True if there is a quota for a given pool of item
     */
    public function isPoolWithQuota($poolId)
    {
        return false;
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
    public function isQuotaReached($poolId, $context = null)
    {
        return false;
    }

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
    public function isOverQuota($poolId, $bookingSetId, $context = null)
    {
        return false;
    }
}
