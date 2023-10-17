Dans le code php / laravel suivant fais en sorte que les sport générés soient suppriméde la liste des sports :
<?php

namespace Database\Factories;

use App\Models\Tache;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends Factory<Tache>
 */
class TacheFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        static $sports = new Collection(['Athlétisme', 'Aviron', 'Badminton', 'Basketball', 'Boxe', 'Canoë', 'Cyclisme', 'Escrime', 'Football', 'Golf', 'Gymnastique', 'Haltérophilie', 'Handball', 'Hockey', 'Judo', 'Lutte', 'Pentathlon moderne', 'Rugby', 'Natation', 'Sports équestres', 'Taekwondo', 'Tennis', 'Tir', 'Triathlon', 'Voile']);
        $sport = $this->faker->randomElement($sports);
        return [
            'nom' => $sport,
            'description' => $this->faker->sentence,
            'annee_ajout' => $this->faker->numberBetween(1896, (new DateTime('now'))->format('Y')),
            'nb_disciplines' => $this->faker->numberBetween(1, 10),
            'nb_epreuves' => $this->faker->numberBetween(1, 20),
            'date_debut' => $this->faker->dateTimeBetween('2024-07-26', '2024-08-11'),
            'date_fin' => $this->faker->dateTimeBetween($sport['date_debut'], '2024-08-11'),
        ];

    }
}
?>