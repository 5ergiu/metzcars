<?php

namespace Database\Factories;

use App\Models\Advert;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'              => $this->faker->name,
            'sold'               => true,
            'deductible_vat'     => $this->faker->boolean,
            'invoice_issued'     => $this->faker->boolean,
            'city'               => "Iași",
            'description'        => "
                Skoda Octavia III - Facelift (2018) 1.6TDI - 128000km \r\n
                TVA Inclus in pret DEDUCTIBIL \r\n
                pret fara TVA 11763 Euro \r\n
                 \r\n
                Jante aliaj \r\n
                Cutie de viteze automata DSG, \r\n
                Navigatie, \r\n
                Oglinzi electrice si incalzite, \r\n
                Geamuri electrice fata-spate, \r\n
                Proiectoare ceata, \r\n
                Climatronic doua zone, \r\n
                Sistem start-stop, \r\n
                Computer de bord, \r\n
                Radio CD, \r\n
                Conectivitate bluetooth, \r\n
                Cotiera centrala fata-spate, \r\n
                Tapiterie textil, \r\n
                Volan multifunctional imbracat in piele, \r\n
                Senzori de ploaie si lumina, \r\n
                Senzori de parcare spate, \r\n
                Stergator luneta \r\n
                Norma de poluare EURO6 \r\n
                Actele si fiscal la zi \r\n
                al doilea proprietar -> import Germania Mai 2020 \r\n
                Raport CarVertical \r\n
                Certificat de Conformitate \r\n
                Kilometraj GARANTAT juridic prin factura \r\n
                Doua chei \r\n
                Mentenanta completa la Skoda \r\n
                Posibilitate Finantare OTP/Mogo/TBI \r\n
                Aducem masini la comanda din EU \r\n
            ",
            'price'              => $this->faker->numberBetween(1234, 251789),
            'brand'              => 'BMW',
            'model'              => 'i8',
            'version'            => $this->faker->name,
            'generation'         => $this->faker->name,
            'year'               => $this->faker->year,
            'mileage'            => $this->faker->numberBetween(12345, 321567),
            'vin'                => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'fuel_type'          => $this->faker->boolean ? "diesel" : "petrol",
            'engine_power'       => $this->faker->numberBetween(90, 400),
            'engine_capacity'    => $this->faker->numberBetween(900, 5000),
            'transmission'       => $this->faker->boolean ? "front-wheel" : "rear-wheel",
            'gearbox'            => $this->faker->boolean ? "automatic" : "manual",
            'pollution_standard' => "Euro 5",
            'particle_filter'    => $this->faker->boolean,
            'urban_consumption'  => $this->faker->randomNumber(1),
            'body_type'          => $this->faker->boolean ? "combi" : "sedan",
            'co2_emissions'      => $this->faker->numberBetween(10, 200),
            'door_count'         => "5",
            'color'              => "black",
            'color_type'         => "metallic",
            'features'           => ["abs", "front-airbags", "front-passenger-airbags", "cd", "onboard-computer", "esp", "front-electric-windows", "central-lock", "radio", "assisted-steering", "air-conditioning", "dual-air-conditioning", "driver-knee-airbag", "side-window-airbags", "rear-passenger-airbags", "bluetooth", "steering-whell-comands", "asr", "electronic-immobiliser", "alloy-wheels", "speed-limiter", "gps", "cruise-control", "fog-lights", "both-parking-sensors", "automatic-wipers", "isofix"],
            'registration_date'  => $this->faker->date,
            'registered'         => $this->faker->boolean,
            'original_owner'     => $this->faker->boolean,
            'no_accident'        => $this->faker->boolean,
            'service_record'     => $this->faker->boolean,
        ];
    }
}
