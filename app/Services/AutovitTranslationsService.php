<?php

namespace App\Services;

class AutovitTranslationsService
{
    const FUEL_TYPE_DIESEL       = 'diesel';
    const FUEL_TYPE_GASOLINE     = 'petrol';
    const FUEL_TYPE_GASOLINE_GPL = 'petrol-lpg';
    const FUEL_TYPE_GASOLINE_CNG = 'petrol-cng';
    const FUEL_TYPE_ELECTRIC     = 'electric';
    const FUEL_TYPE_ETANOL       = 'etanol';
    const FUEL_TYPE_HYBRID       = 'hybrid';
    const FUEL_TYPE_HIDROGEN     = 'hidrogen';

    const GEARBOX_AUTOMATIC = 'automatic';
    const GEARBOX_MANUAL    = 'manual';

    const BODY_TYPE_MINI      = 'mini';
    const BODY_TYPE_CITY_CAR  = 'city-car';
    const BODY_TYPE_COMPACT   = 'compact';
    const BODY_TYPE_SEDAN     = 'sedan';
    const BODY_TYPE_COMBI     = 'combi';
    const BODY_TYPE_MINIVAN   = 'minivan';
    const BODY_TYPE_SUV       = 'suv';
    const BODY_TYPE_CABRIO    = 'cabrio';
    const BODY_TYPE_COUPE     = 'coupe';

    const COLOR_WHITE     = 'white';
    const COLOR_BLUE      = 'blue';
    const COLOR_SILVER    = 'silver';
    const COLOR_BROWN     = 'brown';
    const COLOR_YELL_GOLD = 'yellow-gold';
    const COLOR_GREY      = 'gray';
    const COLOR_BLACK     = 'black';
    const COLOR_RED       = 'red';
    const COLOR_GREEN     = 'green';
    const COLOR_OTHER     = 'other';
    const COLOR_BEIGE     = 'bej';

    const COLOR_TYPE_METALLIC = 'metallic';
    const COLOR_TYPE_MATTE    = 'matt';
    const COLOR_TYPE_PEARLED  = 'pearl';

    const TRANSMISSION_4X4_AUTOMATIC = 'all-wheel-auto';
    const TRANSMISSION_4X4_MANUAL    = 'all-wheel-lock';
    const TRANSMISSION_FRONT         = 'front-wheel';
    const TRANSMISSION_REAR          = 'rear-wheel';

    const FEATURE_ABS                         = "abs";
    const FEATURE_FRONT_AIRBAGS               = "front-airbags";
    const FEATURE_FRONT_PASSENGER_AIRBAGS     = "front-passenger-airbags";
    const FEATURE_CD                          = "cd";
    const FEATURE_ONBOARD_COMPUTER            = "onboard-computer";
    const FEATURE_ESP                         = "esp";
    const FEATURE_FRONT_ELECTRIC_WINDOWS      = "front-electric-windows";
    const FEATURE_CENTRAL_LOCK                = "central-lock";
    const FEATURE_RADIO                       = "radio";
    const FEATURE_ASSISTED_STEERING           = "assisted-steering";
    const FEATURE_PANORAMIC_SUNROOF           = "panoramic-sunroof";
    const FEATURE_AIR_CONDITIONING            = "air-conditioning";
    const FEATURE_DUAL_AIR_CONDITIONING       = "dual-air-conditioning";
    const FEATURE_QUAD_AIR_CONDITIONING       = "quad-air-conditioning";
    const FEATURE_DRIVER_KNEE_AIRBAG          = "driver-knee-airbag";
    const FEATURE_SIDE_WINDOW_AIRBAGS         = "side-window-airbags";
    const FEATURE_REAR_PASSENGER_AIRBAGS      = "rear-passenger-airbags";
    const FEATURE_ALARM                       = "alarm";
    const FEATURE_ROOF_BARS                   = "roof-bars";
    const FEATURE_BLUETOOTH                   = "bluetooth";
    const FEATURE_REARVIEW_CAMERA             = "rearview-camera";
    const FEATURE_TOWING_HOOK                 = "towing-hook";
    const FEATURE_STEERING_WHELL_COMANDS      = "steering-whell-comands";
    const FEATURE_ASR                         = "asr";
    const FEATURE_DVD                         = "dvd";
    const FEATURE_AUTOMATIC_LIGHTS            = "automatic-lights";
    const FEATURE_XENON_LIGHTS                = "xenon-lights";
    const FEATURE_TINTED_WINDOWS              = "tinted-windows";
    const FEATURE_PRIVACY_WINDOWS             = "privacy-windows";
    const FEATURE_REAR_ELECTRIC_WINDOWS       = "rear-electric-windows";
    const FEATURE_HEAD_DISPLAY                = "head-display";
    const FEATURE_ELECTRONIC_IMMOBILISER      = "electronic-immobiliser";
    const FEATURE_AUXILIARY_HEATING           = "auxiliary-heating";
    const FEATURE_LEATHER_INTERIOR            = "leather-interior";
    const FEATURE_VELOUR_INTERIOR             = "velour-interior";
    const FEATURE_AUX_IN                      = "aux-in";
    const FEATURE_ALLOY_WHEELS                = "alloy-wheels";
    const FEATURE_SPEED_LIMITER               = "speed-limiter";
    const FEATURE_LEDS                        = "leds";
    const FEATURE_GPS                         = "gps";
    const FEATURE_ELECTRIC_INTERIOR_MIRROR    = "electric-interior-mirror";
    const FEATURE_ELECTRONIC_REARVIEW_MIRRORS = "electronic-rearview-mirrors";
    const FEATURE_ELECTRIC_EXTERIOR_MIRROR    = "electric-exterior-mirror";
    const FEATURE_HEATED_REARVIEW_MIRRORS     = "heated-rearview-mirrors";
    const FEATURE_HEATED_WINDSHIELD           = "heated-windshield";
    const FEATURE_CRUISE_CONTROL              = "cruise-control";
    const FEATURE_FOG_LIGHTS                  = "fog-lights";
    const FEATURE_FRONT_HEATED_SEATS          = "front-heated-seats";
    const FEATURE_REAR_HEATED_SEATS           = "rear-heated-seats";
    const FEATURE_BOTH_PARKING_SENSORS        = "both-parking-sensors";
    const FEATURE_REAR_PARKING_SENSORS        = "rear-parking-sensors";
    const FEATURE_AUTOMATIC_WIPERS            = "automatic-wipers";
    const FEATURE_ADJUSTABLE_SUSPENSION       = "adjustable-suspension";
    const FEATURE_SUNROOF                     = "sunroof";
    const FEATURE_TV                          = "tv";
    const FEATURE_ISOFIX                      = "isofix";

    /**
     * @return array
     */
    public static function getFuelTypeOptions(): array
    {
        return [
            self::FUEL_TYPE_DIESEL       => __('adverts.fuelTypeOptions.diesel'),
            self::FUEL_TYPE_GASOLINE     => __('adverts.fuelTypeOptions.petrol'),
            self::FUEL_TYPE_GASOLINE_GPL => __('adverts.fuelTypeOptions.petrolLpg'),
            self::FUEL_TYPE_GASOLINE_CNG => __('adverts.fuelTypeOptions.petrolCng'),
            self::FUEL_TYPE_ELECTRIC     => __('adverts.fuelTypeOptions.electric'),
            self::FUEL_TYPE_ETANOL       => __('adverts.fuelTypeOptions.etanol'),
            self::FUEL_TYPE_HYBRID       => __('adverts.fuelTypeOptions.hybrid'),
            self::FUEL_TYPE_HIDROGEN     => __('adverts.fuelTypeOptions.hidrogen'),
        ];
    }

    /**
     * @return array
     */
    public static function getGearboxOptions(): array
    {
        return [
            self::GEARBOX_AUTOMATIC => __('adverts.gearboxOptions.automatic'),
            self::GEARBOX_MANUAL    => __('adverts.gearboxOptions.manual'),
        ];
    }

    /**
     * @return array
     */
    public static function getBodyTypeOptions(): array
    {
        return [
            self::BODY_TYPE_MINI     => __('adverts.bodyTypeOptions.mini'),
            self::BODY_TYPE_CITY_CAR => __('adverts.bodyTypeOptions.cityCar'),
            self::BODY_TYPE_COMPACT  => __('adverts.bodyTypeOptions.compact'),
            self::BODY_TYPE_SEDAN    => __('adverts.bodyTypeOptions.sedan'),
            self::BODY_TYPE_COMBI    => __('adverts.bodyTypeOptions.combi'),
            self::BODY_TYPE_MINIVAN  => __('adverts.bodyTypeOptions.minivan'),
            self::BODY_TYPE_SUV      => __('adverts.bodyTypeOptions.suv'),
            self::BODY_TYPE_CABRIO   => __('adverts.bodyTypeOptions.cabrio'),
            self::BODY_TYPE_COUPE    => __('adverts.bodyTypeOptions.coupe'),
        ];
    }

    /**
     * @return array
     */
    public static function getColorOptions(): array
    {
        return [
            self::COLOR_WHITE     => __('adverts.colorOptions.white'),
            self::COLOR_BLUE      => __('adverts.colorOptions.blue'),
            self::COLOR_SILVER    => __('adverts.colorOptions.silver'),
            self::COLOR_BROWN     => __('adverts.colorOptions.brown'),
            self::COLOR_YELL_GOLD => __('adverts.colorOptions.yellowGold'),
            self::COLOR_GREY      => __('adverts.colorOptions.grey'),
            self::COLOR_BLACK     => __('adverts.colorOptions.black'),
            self::COLOR_RED       => __('adverts.colorOptions.red'),
            self::COLOR_GREEN     => __('adverts.colorOptions.green'),
            self::COLOR_OTHER     => __('adverts.colorOptions.other'),
            self::COLOR_BEIGE     => __('adverts.colorOptions.beige'),
        ];
    }

    /**
     * @return array
     */
    public static function getColorTypeOptions(): array
    {
        return [
            self::COLOR_TYPE_METALLIC => __('adverts.colorTypeOptions.metallic'),
            self::COLOR_TYPE_MATTE    => __('adverts.colorTypeOptions.matte'),
            self::COLOR_TYPE_PEARLED  => __('adverts.colorTypeOptions.pearled'),
        ];
    }

    /**
     * @return array
     */
    public static function getTransmissionOptions(): array
    {
        return [
            self::TRANSMISSION_4X4_AUTOMATIC => __('adverts.transmissionOptions.allWheelAuto'),
            self::TRANSMISSION_4X4_MANUAL    => __('adverts.transmissionOptions.allWheelLock'),
            self::TRANSMISSION_FRONT         => __('adverts.transmissionOptions.frontWheel'),
            self::TRANSMISSION_REAR          => __('adverts.transmissionOptions.rearWheel'),
        ];
    }

    /**
     * @return array
     */
    public static function getPollutionStandardOptions(): array
    {
        return [
            'Euro 1',
            'Euro 2',
            'Euro 3',
            'Euro 4',
            'Euro 5',
            'Euro 6',
            'Non-euro',
        ];
    }

    /**
     * @return array
     */
    public static function getFeatureOptions(): array
    {
        return [
            self::FEATURE_ABS                         => __('adverts.featureOptions.abs'),
            self::FEATURE_FRONT_AIRBAGS               => __('adverts.featureOptions.frontAirbags'),
            self::FEATURE_FRONT_PASSENGER_AIRBAGS     => __('adverts.featureOptions.frontPassengerAirbags'),
            self::FEATURE_CD                          => __('adverts.featureOptions.cd'),
            self::FEATURE_ONBOARD_COMPUTER            => __('adverts.featureOptions.onboardComputer'),
            self::FEATURE_ESP                         => __('adverts.featureOptions.esp'),
            self::FEATURE_FRONT_ELECTRIC_WINDOWS      => __('adverts.featureOptions.frontElectricWindows'),
            self::FEATURE_CENTRAL_LOCK                => __('adverts.featureOptions.centralLock'),
            self::FEATURE_RADIO                       => __('adverts.featureOptions.radio'),
            self::FEATURE_ASSISTED_STEERING           => __('adverts.featureOptions.assistedSteering'),
            self::FEATURE_PANORAMIC_SUNROOF           => __('adverts.featureOptions.panoramicSunroof'),
            self::FEATURE_AIR_CONDITIONING            => __('adverts.featureOptions.airConditioning'),
            self::FEATURE_DUAL_AIR_CONDITIONING       => __('adverts.featureOptions.dualAirConditioning'),
            self::FEATURE_QUAD_AIR_CONDITIONING       => __('adverts.featureOptions.quadAirConditioning'),
            self::FEATURE_DRIVER_KNEE_AIRBAG          => __('adverts.featureOptions.driverKneeAirbag'),
            self::FEATURE_SIDE_WINDOW_AIRBAGS         => __('adverts.featureOptions.sideWindowAirbags'),
            self::FEATURE_REAR_PASSENGER_AIRBAGS      => __('adverts.featureOptions.rearPassengerAirbags'),
            self::FEATURE_ALARM                       => __('adverts.featureOptions.alarm'),
            self::FEATURE_ROOF_BARS                   => __('adverts.featureOptions.roofBars'),
            self::FEATURE_BLUETOOTH                   => __('adverts.featureOptions.bluetooth'),
            self::FEATURE_REARVIEW_CAMERA             => __('adverts.featureOptions.rearviewCamera'),
            self::FEATURE_TOWING_HOOK                 => __('adverts.featureOptions.towingHook'),
            self::FEATURE_STEERING_WHELL_COMANDS      => __('adverts.featureOptions.steeringWhellComands'),
            self::FEATURE_ASR                         => __('adverts.featureOptions.asr'),
            self::FEATURE_DVD                         => __('adverts.featureOptions.dvd'),
            self::FEATURE_AUTOMATIC_LIGHTS            => __('adverts.featureOptions.automaticLights'),
            self::FEATURE_XENON_LIGHTS                => __('adverts.featureOptions.xenonLights'),
            self::FEATURE_TINTED_WINDOWS              => __('adverts.featureOptions.tintedWindows'),
            self::FEATURE_PRIVACY_WINDOWS             => __('adverts.featureOptions.privacyWindows'),
            self::FEATURE_REAR_ELECTRIC_WINDOWS       => __('adverts.featureOptions.rearElectricWindows'),
            self::FEATURE_HEAD_DISPLAY                => __('adverts.featureOptions.headDisplay'),
            self::FEATURE_ELECTRONIC_IMMOBILISER      => __('adverts.featureOptions.electronicImmobiliser'),
            self::FEATURE_AUXILIARY_HEATING           => __('adverts.featureOptions.auxiliaryHeating'),
            self::FEATURE_LEATHER_INTERIOR            => __('adverts.featureOptions.leatherInterior'),
            self::FEATURE_VELOUR_INTERIOR             => __('adverts.featureOptions.velourInterior'),
            self::FEATURE_AUX_IN                      => __('adverts.featureOptions.auxIn'),
            self::FEATURE_ALLOY_WHEELS                => __('adverts.featureOptions.alloyWheels'),
            self::FEATURE_SPEED_LIMITER               => __('adverts.featureOptions.speedLimiter'),
            self::FEATURE_LEDS                        => __('adverts.featureOptions.leds'),
            self::FEATURE_GPS                         => __('adverts.featureOptions.gps'),
            self::FEATURE_ELECTRIC_INTERIOR_MIRROR    => __('adverts.featureOptions.electricInteriorMirror'),
            self::FEATURE_ELECTRONIC_REARVIEW_MIRRORS => __('adverts.featureOptions.electronicRearviewMirrors'),
            self::FEATURE_ELECTRIC_EXTERIOR_MIRROR    => __('adverts.featureOptions.electricExteriorMirror'),
            self::FEATURE_HEATED_REARVIEW_MIRRORS     => __('adverts.featureOptions.heatedRearviewMirrors'),
            self::FEATURE_HEATED_WINDSHIELD           => __('adverts.featureOptions.heatedWindshield'),
            self::FEATURE_CRUISE_CONTROL              => __('adverts.featureOptions.cruiseControl'),
            self::FEATURE_FOG_LIGHTS                  => __('adverts.featureOptions.fogLights'),
            self::FEATURE_FRONT_HEATED_SEATS          => __('adverts.featureOptions.frontHeatedSeats'),
            self::FEATURE_REAR_HEATED_SEATS           => __('adverts.featureOptions.rearHeatedSeats'),
            self::FEATURE_BOTH_PARKING_SENSORS        => __('adverts.featureOptions.bothParkingSensors'),
            self::FEATURE_REAR_PARKING_SENSORS        => __('adverts.featureOptions.rearParkingSensors'),
            self::FEATURE_AUTOMATIC_WIPERS            => __('adverts.featureOptions.automaticWipers'),
            self::FEATURE_ADJUSTABLE_SUSPENSION       => __('adverts.featureOptions.adjustableSuspension'),
            self::FEATURE_SUNROOF                     => __('adverts.featureOptions.sunroof'),
            self::FEATURE_TV                          => __('adverts.featureOptions.tv'),
            self::FEATURE_ISOFIX                      => __('adverts.featureOptions.isofix'),
        ];
    }

    /**
     * return @array
     */
    public function getTranslatedOptions(): array
    {
        return [
            'fuelTypeOptions'          => self::getFuelTypeOptions(),
            'gearboxOptions'           => self::getGearboxOptions(),
            'bodyTypeOptions'          => self::getBodyTypeOptions(),
            'colorOptions'             => self::getColorOptions(),
            'colorTypeOptions'         => self::getColorTypeOptions(),
            'transmissionOptions'      => self::getTransmissionOptions(),
            'pollutionStandardOptions' => self::getPollutionStandardOptions(),
            'featureOptions'           => self::getFeatureOptions(),
        ];
    }
}
