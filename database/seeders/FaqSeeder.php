<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqItem;
use App\Models\OpeningHour;

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
                'category'       => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon'  => '📍',
                'question'       => 'Où se trouve Factory & Co à Val d\'Europe ?',
                'answer'         => 'Factory & Co est situé <strong>en plein cœur</strong> du centre commercial Val d\'Europe, à l\'adresse : <strong>14 Rue du Danube, Serris 77700</strong>. Nous sommes facilement accessibles depuis le parking gratuit du centre et la gare RER Val d\'Europe.',
                'sort_order'     => 1,
            ],
            [
                'category'       => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon'  => '📍',
                'question'       => 'Comment rejoindre Val d\'Europe en transports en commun ?',
                'answer'         => 'Val d\'Europe est facilement accessible par le <strong>RER E</strong> (gare du Val d\'Europe - Serris). Depuis Paris, rejoignez la Gare de l\'Est et prenez le RER E direction Hausmann-St-Lazare. Vous pouvez aussi emprunter les navettes depuis Disneyland Paris (très proche). Par voiture, parking gratuit du centre disponible.',
                'sort_order'     => 2,
            ],
            [
                'category'       => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon'  => '📍',
                'question'       => 'Le restaurant est-il accessible aux personnes à mobilité réduite ?',
                'answer'         => 'Oui, Factory & Co est entièrement accessible aux personnes à mobilité réduite (PMR). L\'aéroport dispose d\'ascenseurs et de rampes d\'accès. Notre comptoir est adapté et notre équipe est formée pour accueillir tous nos clients.',
                'sort_order'     => 3,
            ],
            // HORAIRES
            [
                'category'       => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon'  => '🕐',
                'question'       => 'Quels sont les horaires d\'ouverture de Factory & Co Val d\'Europe ?',
                'answer'         => 'Factory & Co est ouvert <strong>7 jours sur 7, 365 jours par an</strong> :<br>• Lundi–Mercredi : 07h00 – 21h30<br>• Jeudi–Vendredi : 07h00 – 22h00<br>• Samedi–Dimanche : 07h00 – 22h30',
                'sort_order'     => 4,
            ],
            [
                'category'       => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon'  => '🕐',
                'question'       => 'Le restaurant est-il ouvert les jours fériés ?',
                'answer'         => 'Oui, Factory & Co est ouvert <strong>tous les jours fériés</strong> sans exception, y compris Noël, le Jour de l\'An et le 14 juillet. Les horaires peuvent être légèrement ajustés selon les vols, mais le restaurant ne ferme jamais.',
                'sort_order'     => 5,
            ],
            [
                'category'       => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon'  => '🕐',
                'question'       => 'Puis-je manger chez Factory & Co très tôt le matin ?',
                'answer'         => 'Absolument ! Nous ouvrons à <strong>07h00</strong> tous les jours. Notre service breakfast (bagels, smoothie bowls, cafés) est disponible dès l\'ouverture. Idéal avant une journée de shopping ou une visite à Disneyland Paris !',
                'sort_order'     => 6,
            ],
            // ALLERGÈNES
            [
                'category'       => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon'  => '🌿',
                'question'       => 'Proposez-vous des options Halal ?',
                'answer'         => 'Oui ! Nous proposons plusieurs options <strong>Halal certifiées</strong> : le Halal Smash Burger, le Chicken Avocado Bagel, les Super Bowls et la plupart de nos cheesecakes. Les produits Halal sont clairement identifiés sur notre carte avec le badge vert.',
                'sort_order'     => 7,
            ],
            [
                'category'       => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon'  => '🌿',
                'question'       => 'Y a-t-il des options végétariennes et véganes ?',
                'answer'         => 'Oui, nous proposons plusieurs options végétariennes et véganes : <strong>Veggie Smash Burger</strong>, <strong>Veggie Bagel</strong>, <strong>Super Bowl Quinoa</strong>, <strong>Veggie Bowl</strong> et <strong>Smoothie Bowl</strong>. Tous nos cheesecakes sont végétariens.',
                'sort_order'     => 8,
            ],
            [
                'category'       => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon'  => '🌿',
                'question'       => 'Comment obtenir la liste complète des allergènes ?',
                'answer'         => 'La liste complète des allergènes est disponible sur notre carte en restaurant et sur notre site web. Les 14 allergènes majeurs (gluten, lait, œufs, arachides, noix, soja, poisson, crustacés, céleri, moutarde, sésame, lupin, mollusques, anhydride sulfureux) sont clairement indiqués pour chaque produit. N\'hésitez pas à demander à notre équipe.',
                'sort_order'     => 9,
            ],
            [
                'category'       => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon'  => '🌿',
                'question'       => 'Proposez-vous des options sans gluten ?',
                'answer'         => 'Nous proposons plusieurs plats naturellement sans gluten : nos <strong>bowls</strong> (quinoa, riz brun), nos <strong>salades</strong> et certains <strong>cheesecakes</strong>. En revanche, notre cuisine n\'est pas une cuisine "sans gluten certifiée" : des traces de gluten peuvent être présentes en raison de la manipulation en cuisine.',
                'sort_order'     => 10,
            ],
            // COMMANDE
            [
                'category'       => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon'  => '📦',
                'question'       => 'Comment fonctionne le Click & Collect chez Factory & Co ?',
                'answer'         => 'Le Click & Collect vous permet de <strong>commander et payer en ligne</strong> avant votre arrivée à l\'aéroport. Indiquez l\'heure de récupération souhaitée, passez la sécurité, et récupérez votre commande directement au comptoir sans attendre. Idéal pour les voyageurs pressés !',
                'sort_order'     => 11,
            ],
            [
                'category'       => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon'  => '📦',
                'question'       => 'Quels moyens de paiement acceptez-vous ?',
                'answer'         => 'Nous acceptons toutes les cartes bancaires (Visa, Mastercard, American Express), les paiements sans contact (Apple Pay, Google Pay, Samsung Pay) et les espèces en euros. Nous n\'acceptons pas les chèques.',
                'sort_order'     => 12,
            ],
        ];

        foreach ($faqs as $data) {
            FaqItem::create($data);
        }

        /* ── HORAIRES D'OUVERTURE ── */
        $hours = [
            [
                'days_label'  => 'Lundi – Mercredi',
                'days_of_week'=> ['Monday', 'Tuesday', 'Wednesday'],
                'opens_at'    => '07:00:00',
                'closes_at'   => '21:30:00',
                'sort_order'  => 1,
            ],
            [
                'days_label'  => 'Jeudi – Vendredi',
                'days_of_week'=> ['Thursday', 'Friday'],
                'opens_at'    => '07:00:00',
                'closes_at'   => '22:00:00',
                'sort_order'  => 2,
            ],
            [
                'days_label'  => 'Samedi – Dimanche',
                'days_of_week'=> ['Saturday', 'Sunday'],
                'opens_at'    => '07:00:00',
                'closes_at'   => '22:30:00',
                'sort_order'  => 3,
            ],
        ];

        foreach ($hours as $data) {
            OpeningHour::create($data);
        }

        $this->command->info('✅ ' . count($faqs) . ' FAQs et ' . count($hours) . ' plages horaires insérées.');
    }
}
