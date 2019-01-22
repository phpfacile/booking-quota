<?php
namespace PHPFacile\Booking\Quota\Service;

interface QuotaServiceInterface
{
    /**
     * Returns true if there is a quota for a given pool of item
     *
     * @param integer|string $poolId Id of the pool (of item that can be booked)
     *
     * @return boolean True if there is a quota for a given pool of item
     */
    public function isPoolWithQuota($poolId);

    /**
     * Returns true if the quota is reached for a given pool of item
     * taking into account a context (ex: maybe there is a quota of children for a given show)
     *
     * FIXME Might have to be able to return a user friendly error message
     * in case quota is reached (ex: you're not allowed to purchase more than 3 items)
     *
     * REM: Called before pre-reservation
     *
     * @param integer|string $poolId  Id of the pool (of item that can be booked)
     * @param mixed          $context Context so as to be able to manage different quotas depending on user profile for example
     *
     * @return boolean True if the quota is reached
     */
    public function isQuotaReached($poolId, $context = null);

     /**
      * Returns true if validating a given booking set (several bookings) would
      * lead to a quota limit overpassed
      *
      * FIXME Might have to be able to return a user friendly error message
      * in case quota is reached (ex: you're not allowed to purchase more than 3 items)
      *
      * REM: Called before pre-reservation
      *
      * @param integer|string $poolId       Id of the pool (of item that can be booked)
      * @param integer|string $bookingSetId Id of the booking set
      * @param mixed          $context      Context so as to be able to manage different quotas depending on user profile for example
      *
      * @return boolean True if the quota is reached
      */
    public function isOverQuota($poolId, $bookingSetId, $context = null);
}
