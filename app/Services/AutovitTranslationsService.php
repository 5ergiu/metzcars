<?php

namespace App\Services;

class AutovitTranslationsService
{
    const FUEL_TYPE_DIESEL   = 1;
    const FUEL_TYPE_GASOLINE = 2;
    const FUEL_TYPE_HYBRID   = 3;

    const GEARBOX_AUTOMATIC = 1;
    const GEARBOX_MANUAL    = 2;

    const BODY_TYPE_SMALL     = 1;
    const BODY_TYPE_CITY      = 2;
    const BODY_TYPE_COMPACT   = 3;
    const BODY_TYPE_SEDAN     = 4;
    const BODY_TYPE_COMBI     = 5;
    const BODY_TYPE_MONOVOLUM = 6;
    const BODY_TYPE_SUV       = 7;
    const BODY_TYPE_CABRIO    = 8;
    const BODY_TYPE_COUPE     = 9;

    const COLOR_WHITE     = 1;
    const COLOR_BLUE      = 2;
    const COLOR_SILVER    = 3;
    const COLOR_BROWN     = 4;
    const COLOR_YELL_GOLD = 5;
    const COLOR_GREY      = 6;
    const COLOR_BLACK     = 7;
    const COLOR_RED       = 8;
    const COLOR_GREEN     = 9;
    const COLOR_OTHER     = 10;
    const COLOR_BEIGE     = 11;

    const COLOR_TYPE_METALLIC = 1;
    const COLOR_TYPE_MATTE    = 2;
    const COLOR_TYPE_PEARLED  = 3;

    const TRANSMISSION_4X4_AUTOMATIC = 1;
    const TRANSMISSION_4X4_MANUAL    = 2;
    const TRANSMISSION_FRONT         = 3;
    const TRANSMISSION_REAR          = 4;

    const FEATURE_ABS                         = 1;
    const FEATURE_FRONT_AIRBAGS               = 2;
    const FEATURE_FRONT_PASSENGER_AIRBAGS     = 3;
    const FEATURE_CD                          = 4;
    const FEATURE_ONBOARD_COMPUTER            = 5;
    const FEATURE_ESP                         = 6;
    const FEATURE_FRONT_ELECTRIC_WINDOWS      = 7;
    const FEATURE_CENTRAL_LOCK                = 8;
    const FEATURE_RADIO                       = 9;
    const FEATURE_ASSISTED_STEERING           = 10;
    const FEATURE_PANORAMIC_SUNROOF           = 11;
    const FEATURE_AIR_CONDITIONING            = 12;
    const FEATURE_DUAL_AIR_CONDITIONING       = 13;
    const FEATURE_QUAD_AIR_CONDITIONING       = 14;
    const FEATURE_DRIVER_KNEE_AIRBAG          = 15;
    const FEATURE_SIDE_WINDOW_AIRBAGS         = 16;
    const FEATURE_REAR_PASSENGER_AIRBAGS      = 17;
    const FEATURE_ALARM                       = 18;
    const FEATURE_ROOF_BARS                   = 19;
    const FEATURE_BLUETOOTH                   = 20;
    const FEATURE_REARVIEW_CAMERA             = 21;
    const FEATURE_TOWING_HOOK                 = 22;
    const FEATURE_STEERING_WHELL_COMANDS      = 23;
    const FEATURE_ASR                         = 24;
    const FEATURE_DVD                         = 25;
    const FEATURE_AUTOMATIC_LIGHTS            = 26;
    const FEATURE_XENON_LIGHTS                = 27;
    const FEATURE_TINTED_WINDOWS              = 28;
    const FEATURE_PRIVACY_WINDOWS             = 29;
    const FEATURE_REAR_ELECTRIC_WINDOWS       = 30;
    const FEATURE_HEAD_DISPLAY                = 31;
    const FEATURE_ELECTRONIC_IMMOBILISER      = 32;
    const FEATURE_AUXILIARY_HEATING           = 33;
    const FEATURE_LEATHER_INTERIOR            = 34;
    const FEATURE_VELOUR_INTERIOR             = 35;
    const FEATURE_AUX_IN                      = 36;
    const FEATURE_ALLOY_WHEELS                = 37;
    const FEATURE_SPEED_LIMITER               = 38;
    const FEATURE_LEDS                        = 39;
    const FEATURE_GPS                         = 40;
    const FEATURE_ELECTRIC_INTERIOR_MIRROR    = 41;
    const FEATURE_ELECTRONIC_REARVIEW_MIRRORS = 42;
    const FEATURE_ELECTRIC_EXTERIOR_MIRROR    = 43;
    const FEATURE_HEATED_REARVIEW_MIRRORS     = 44;
    const FEATURE_HEATED_WINDSHIELD           = 45;
    const FEATURE_CRUISE_CONTROL              = 46;
    const FEATURE_FOG_LIGHTS                  = 47;
    const FEATURE_FRONT_HEATED_SEATS          = 48;
    const FEATURE_REAR_HEATED_SEATS           = 49;
    const FEATURE_BOTH_PARKING_SENSORS        = 50;
    const FEATURE_REAR_PARKING_SENSORS        = 51;
    const FEATURE_AUTOMATIC_WIPERS            = 52;
    const FEATURE_ADJUSTABLE_SUSPENSION       = 53;
    const FEATURE_SUNROOF                     = 54;
    const FEATURE_TV                          = 55;
    const FEATURE_ISOFIX                      = 56;

    /**
     * @return array
     */
    public static function getFuelTypeOptions(): array
    {
        return [
            self::FUEL_TYPE_DIESEL   => __('adverts.fuelTypeOptions.diesel'),
            self::FUEL_TYPE_GASOLINE => __('adverts.fuelTypeOptions.gasoline'),
            self::FUEL_TYPE_HYBRID   => __('adverts.fuelTypeOptions.hybrid'),
        ];
    }

    /**
     * @return array
     */
    public static function getGearboxOptions(): array
    {
        return [
            self::GEARBOX_AUTOMATIC => __('adverts.gearboxOptions.manual'),
            self::GEARBOX_MANUAL    => __('adverts.gearboxOptions.automatic'),
        ];
    }

    /**
     * @return array
     */
    public static function getBodyTypeOptions(): array
    {
        return [
            self::BODY_TYPE_SMALL     => __('adverts.bodyTypeOptions.small'),
            self::BODY_TYPE_CITY      => __('adverts.bodyTypeOptions.city'),
            self::BODY_TYPE_COMPACT   => __('adverts.bodyTypeOptions.compact'),
            self::BODY_TYPE_SEDAN     => __('adverts.bodyTypeOptions.sedan'),
            self::BODY_TYPE_COMBI     => __('adverts.bodyTypeOptions.combi'),
            self::BODY_TYPE_MONOVOLUM => __('adverts.bodyTypeOptions.monovolum'),
            self::BODY_TYPE_SUV       => __('adverts.bodyTypeOptions.suv'),
            self::BODY_TYPE_CABRIO    => __('adverts.bodyTypeOptions.cabrio'),
            self::BODY_TYPE_COUPE     => __('adverts.bodyTypeOptions.coupe'),
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
            self::COLOR_YELL_GOLD => __('adverts.colorOptions.yellow') . '/' . __('adverts.colorOptions.golden'),
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
            self::TRANSMISSION_4X4_AUTOMATIC => __('adverts.transmissionOptions.4x4a'),
            self::TRANSMISSION_4X4_MANUAL    => __('adverts.transmissionOptions.4x4m'),
            self::TRANSMISSION_FRONT         => __('adverts.transmissionOptions.front'),
            self::TRANSMISSION_REAR          => __('adverts.transmissionOptions.rear'),
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
}
