<?php

namespace App\Hotels\Providers;

use App\Hotels\Hotel;
use App\Hotels\Apis\BestHotelsApi;
use App\Hotels\Providers\Abstracts\HotelProvider;
use Carbon\Carbon;

class BestHotelsProvider implements HotelProvider
{
    const PROVIDER_NAME = 'BestHotels';

    /**
     * @var BestHotelsApi
     */
    private $api;

    /**
     * BestHotelsProvider constructor.
     * @param BestHotelsApi $api
     */
    public function __construct(BestHotelsApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $cityIataCode
     * @param int $numberOfAdults
     * @return array
     */
    public function findMany(string $from, string $to, string $cityIataCode, int $numberOfAdults): array
    {
        $hotelsApiResult = $this->api->getHotels(
            Carbon::parse($from)->toIso8601ZuluString(),
            Carbon::parse($to)->toIso8601ZuluString(),
            $cityIataCode,
            $numberOfAdults
        );

        foreach ($hotelsApiResult as $hotelAttributes) {
            $hotels[] = $this->createHotelInstance($hotelAttributes);
        }

        return $hotels ?? [];
    }

    /**
     * Create an object from Hotel and Hydrate it.
     *
     * @param $hotelAttributes
     * @return Hotel
     */
    public function createHotelInstance($hotelAttributes): Hotel
    {
        return (new Hotel)
            ->setName($hotelAttributes['hotel'])
            ->setProvider(static::PROVIDER_NAME)
            ->setFare($hotelAttributes['hotelFare'])
            ->setRate($hotelAttributes['hotelRate'])
            ->setAmenities(explode(',', $hotelAttributes['roomAmenities']));
    }
}
