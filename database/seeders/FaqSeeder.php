<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        FaqItem::truncate();
        OpeningHour::truncate();

        /* ── FAQ ── */
        $faqs = [
            // ACCÈS
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Où se trouve Factory & Co à Aéroville ?',
                'answer' => 'Factory & Co est situé <strong>au cœur</strong> du CC Westfield Aéroville, <strong>30 Rue des Buissons, 93290 Tremblay-en-France</strong>. Le restaurant est accessible depuis le parking du centre (4 000+ places, 3 h gratuites), le <strong>RER B</strong> (gare Parc des Expositions) ou la <strong>navette gratuite depuis l\'aéroport CDG</strong>.',
                'sort_order' => 1,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Comment venir à Aéroville en transports en commun ?',
                'answer' => '<strong>En RER B</strong> : descendez à la gare <strong>Parc des Expositions</strong>, le centre commercial est à quelques minutes à pied.<br><strong>En bus</strong> : lignes <strong>350</strong> et <strong>351</strong> desservent directement Aéroville.<br><strong>Depuis l\'aéroport CDG</strong> : navette gratuite depuis les terminaux.<br><strong>En voiture</strong> : accès par l\'A1 ou l\'A3, parking de 4 000+ places (3 h gratuites).',
                'sort_order' => 2,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Le restaurant est-il accessible aux personnes à mobilité réduite ?',
                'answer' => 'Oui, Factory & Co est entièrement accessible aux personnes à mobilité réduite (PMR). Le centre commercial Westfield Aéroville dispose d\'ascenseurs, de rampes d\'accès et de places de parking réservées. Notre comptoir est adapté et notre équipe est formée pour accueillir tous nos clients.',
                'sort_order' => 3,
            ],
            // HORAIRES
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Quels sont les horaires d\'ouverture de Factory & Co Aéroville ?',
                'answer' => 'Factory & Co Aéroville est ouvert <strong>7 jours sur 7</strong> :<br>• Dimanche à Jeudi : <strong>8 h 30 – 22 h 00</strong><br>• Vendredi – Samedi : <strong>8 h 30 – 23 h 00</strong>',
                'sort_order' => 4,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Le restaurant est-il ouvert les jours fériés ?',
                'answer' => 'Oui, Factory & Co Aéroville est ouvert <strong>tous les jours fériés</strong> sans exception, y compris Noël, le Jour de l\'An et le 14 juillet. Les horaires peuvent être légèrement ajustés selon les horaires du centre commercial.',
                'sort_order' => 5,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Puis-je prendre un petit-déjeuner chez Factory & Co ?',
                'answer' => 'Absolument ! Nous ouvrons à <strong>8 h 30</strong> tous les jours. Notre offre breakfast (bagels frais, pancakes, viennoiseries, cafés de spécialité) est disponible dès l\'ouverture. Idéal avant une journée de shopping à Aéroville ou une séance au Pathé !',
                'sort_order' => 6,
            ],
            // ALLERGÈNES
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Vos produits sont-ils Halal ?',
                'answer' => 'Oui, chez Factory & Co <strong>l\'ensemble de notre viande est Halal</strong>. Ce n\'est pas une option à part : c\'est notre offre standard, naturellement intégrée à toute la carte. Smash Burgers, bagels, bowls — tous nos plats à base de viande sont préparés avec de la viande Halal certifiée.',
                'sort_order' => 7,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Y a-t-il des options végétariennes et véganes ?',
                'answer' => 'Oui, nous proposons plusieurs options végétariennes et véganes : <strong>Veggie Smash Burger</strong>, <strong>Veggie Bagel</strong>, <strong>Super Bowl Quinoa</strong>, <strong>Veggie Bowl</strong> et <strong>Smoothie Bowl</strong>. Tous nos cheesecakes sont végétariens.',
                'sort_order' => 8,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Comment obtenir la liste complète des allergènes ?',
                'answer' => 'La liste complète des allergènes est disponible sur notre carte en restaurant et sur notre site web. Les 14 allergènes majeurs (gluten, lait, œufs, arachides, noix, soja, poisson, crustacés, céleri, moutarde, sésame, lupin, mollusques, anhydride sulfureux) sont clairement indiqués pour chaque produit. N\'hésitez pas à demander à notre équipe.',
                'sort_order' => 9,
            ],
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Proposez-vous des options sans gluten ?',
                'answer' => 'Nous proposons plusieurs plats naturellement sans gluten : nos <strong>bowls</strong> (quinoa, riz brun), nos <strong>salades</strong> et certains <strong>cheesecakes</strong>. En revanche, notre cuisine n\'est pas certifiée « sans gluten » : des traces peuvent être présentes en raison de la manipulation en cuisine.',
                'sort_order' => 10,
            ],
            // COMMANDE
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Comment fonctionne le Click & Collect chez Factory & Co ?',
                'answer' => 'Le Click & Collect vous permet de <strong>commander et payer en ligne</strong> avant votre arrivée. Indiquez l\'heure de récupération souhaitée et récupérez votre commande directement au comptoir sans attendre. Idéal pour les shoppers pressés ou avant de reprendre la navette vers CDG !',
                'sort_order' => 11,
            ],
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Quels moyens de paiement acceptez-vous ?',
                'answer' => 'Nous acceptons toutes les cartes bancaires (Visa, Mastercard, American Express), les paiements sans contact (Apple Pay, Google Pay, Samsung Pay) et les espèces en euros. Nous n\'acceptons pas les chèques.',
                'sort_order' => 12,
            ],
            // SPÉCIALITÉS — FAQ SEO localisée Aéroville
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Où manger un vrai smash burger à Aéroville ?',
                'answer' => 'Chez <strong>Factory & Co au CC Westfield Aéroville</strong> (30 Rue des Buissons, 93290 Tremblay-en-France), nos smash burgers sont préparés devant vous : viande Halal certifiée, smashée sur plaque brûlante à 200 °C, cheddar fondant et brioche dorée. Accessible en <strong>RER B</strong> (gare Parc des Expositions), en bus 350/351 ou en voiture (parking 3 h gratuites). Ouvert 7j/7 dès 8 h 30.',
                'sort_order' => 13,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Peut-on prendre un petit-déjeuner américain près de l\'aéroport CDG ?',
                'answer' => 'Oui ! Factory & Co Aéroville ouvre <strong>dès 8 h 30, 7j/7</strong>. Bagels frais du jour, pancakes, viennoiseries et cafés de spécialité vous attendent au CC Westfield Aéroville, à quelques minutes de l\'aéroport Paris-CDG via la <strong>navette gratuite</strong> ou le <strong>RER B</strong>. Idéal avant un vol ou en début de journée shopping.',
                'sort_order' => 14,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Quels cheesecakes sont disponibles chez Factory & Co Aéroville ?',
                'answer' => 'Notre carte de cheesecakes comprend : <strong>New-Yorkais Classique</strong>, <strong>Framboise–Chocolat Blanc</strong>, <strong>Oreo</strong>, <strong>Kinder Bueno</strong> et <strong>Spéculoos</strong>. Tous sont préparés chaque jour dans notre restaurant du CC Westfield Aéroville. Nous proposons aussi un <strong>Coffret 4 Parts à emporter</strong>, parfait avant un vol depuis CDG. Allergènes : gluten, lait, œufs (traces de noix possibles).',
                'sort_order' => 15,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Les burgers de Factory & Co Aéroville sont-ils Halal ?',
                'answer' => 'Oui, chez Factory & Co <strong>l\'ensemble de notre viande est Halal certifiée</strong>. Ce n\'est pas une option : c\'est notre standard sur toute la carte. Smash Burgers, bagels garnis, bowls — vous pouvez commander en toute confiance. Retrouvez-nous au <strong>CC Westfield Aéroville, 30 Rue des Buissons, 93290 Tremblay-en-France</strong>.',
                'sort_order' => 16,
            ],
        ];

        foreach ($faqs as $data) {
            FaqItem::create($data);
        }

        /* ── HORAIRES D'OUVERTURE ── */
        $hours = [
            [
                'days_label' => 'Dimanche – Jeudi',
                'days_of_week' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'],
                'opens_at' => '08:30:00',
                'closes_at' => '22:00:00',
                'sort_order' => 1,
            ],
            [
                'days_label' => 'Vendredi – Samedi',
                'days_of_week' => ['Friday', 'Saturday'],
                'opens_at' => '08:30:00',
                'closes_at' => '23:00:00',
                'sort_order' => 2,
            ],
        ];

        foreach ($hours as $data) {
            OpeningHour::create($data);
        }

        $this->command->info('✅ '.count($faqs).' FAQs et '.count($hours).' plages horaires insérées.');
    }
}
