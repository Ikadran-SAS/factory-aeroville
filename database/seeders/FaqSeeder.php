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
                'answer' => 'Factory & Co est situé <strong>en plein cœur</strong> du CC Westfield Aéroville, à l\'adresse : <strong>30 Rue des Buissons, 93290 Tremblay-en-France</strong>. Nous sommes facilement accessibles depuis le parking gratuit du centre et la gare RER B Parc des Expositions.',
                'sort_order' => 1,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Comment rejoindre Aéroville en transports en commun ?',
                'answer' => 'Aéroville est facilement accessible par le <strong>RER B</strong> (gare Parc des Expositions). Vous pouvez aussi emprunter les lignes de bus <strong>350</strong> et <strong>351</strong> qui desservent directement le centre, ou la <strong>navette gratuite</strong> depuis l\'aéroport Paris-CDG (très proche). Par voiture, parking gratuit du centre disponible (4 000+ places).',
                'sort_order' => 2,
            ],
            [
                'category' => 'acces',
                'category_label' => 'Accès & Localisation',
                'category_icon' => '📍',
                'question' => 'Le restaurant est-il accessible aux personnes à mobilité réduite ?',
                'answer' => 'Oui, Factory & Co est entièrement accessible aux personnes à mobilité réduite (PMR). Le centre commercial dispose d\'ascenseurs et de rampes d\'accès. Notre comptoir est adapté et notre équipe est formée pour accueillir tous nos clients.',
                'sort_order' => 3,
            ],
            // HORAIRES
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Quels sont les horaires d\'ouverture de Factory & Co Aéroville ?',
                'answer' => 'Factory & Co est ouvert <strong>7 jours sur 7, 365 jours par an</strong> :<br>• Dimanche – Jeudi : 08h30 – 22h00<br>• Vendredi – Samedi : 08h30 – 23h00',
                'sort_order' => 4,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Le restaurant est-il ouvert les jours fériés ?',
                'answer' => 'Factory & Co Aéroville suit les horaires du <strong>CC Westfield Aéroville</strong>. Nous sommes ouverts la plupart des jours fériés, mais le restaurant est <strong>fermé le 1er mai, le 25 décembre et le 1er janvier</strong>. Les horaires peuvent être ajustés sur d\'autres jours fériés : nous vous recommandons de consulter les horaires du centre commercial ou de nous appeler au 01 74 25 78 52 avant votre venue.',
                'sort_order' => 5,
            ],
            [
                'category' => 'horaires',
                'category_label' => 'Horaires & Service',
                'category_icon' => '🕐',
                'question' => 'Puis-je manger chez Factory & Co très tôt le matin ?',
                'answer' => 'Absolument ! Nous ouvrons à <strong>08h30</strong> tous les jours. Notre service breakfast (bagels, smoothie bowls, cafés) est disponible dès l\'ouverture. Idéal avant une journée de shopping à Westfield Aéroville !',
                'sort_order' => 6,
            ],
            // ALLERGÈNES
            [
                'category' => 'allergenes',
                'category_label' => 'Allergènes & Régimes',
                'category_icon' => '🌿',
                'question' => 'Proposez-vous des options Halal ?',
                'answer' => 'Oui ! Nous proposons plusieurs options <strong>Halal certifiées</strong> : le Halal Smash Burger, le Chicken Avocado Bagel, les Super Bowls et la plupart de nos cheesecakes. Les produits Halal sont clairement identifiés sur notre carte avec le badge vert.',
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
            // COMMANDE
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Comment fonctionne le Click & Collect chez Factory & Co ?',
                'answer' => 'Le Click & Collect vous permet de <strong>commander et payer en ligne</strong> avant votre arrivée au restaurant. Indiquez l\'heure de récupération souhaitée et récupérez votre commande directement au comptoir sans attendre. Idéal pour les shoppers pressés ou avant de reprendre la navette vers CDG !',
                'sort_order' => 10,
            ],
            [
                'category' => 'commande',
                'category_label' => 'Commande & Paiement',
                'category_icon' => '📦',
                'question' => 'Quels moyens de paiement acceptez-vous ?',
                'answer' => 'Nous acceptons toutes les cartes bancaires (Visa, Mastercard, American Express), les paiements sans contact (Apple Pay, Google Pay, Samsung Pay) et les espèces en euros. Nous n\'acceptons pas les chèques.',
                'sort_order' => 11,
            ],
            // SPÉCIALITÉS
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Quelle est la différence entre un Smash Burger et un burger classique ?',
                'answer' => 'Le Smash Burger, c\'est une technique de cuisson précise : la viande est posée sur une plaque brûlante et écrasée immédiatement pour créer une croûte caramélisée et savoureux. Le résultat ? Une texture croustillante dehors, succulente dedans, avec un goût bien plus intense qu\'un burger traditionnel. Chaque smash burger est préparé à la minute, jamais précuit.',
                'sort_order' => 12,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Les bagels sont-ils vraiment new-yorkais ?',
                'answer' => 'Absolument. Notre chef Jonathan a apporté les vraies recettes de Brooklyn. Nos bagels sont bouillis avant la cuisson (contrairement aux pains classiques), ce qui leur donne cette texture unique : croustillants dehors, moelleux dedans. Chaque matin, ils sont préparés frais. C\'est l\'authentique recette new-yorkaise, pas une copie commerciale.',
                'sort_order' => 13,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Puis-je customiser les spécialités ?',
                'answer' => 'Bien sûr ! Nos spécialités sont préparées à la minute. Vous pouvez adapter votre Smash Burger, Bagel ou Breakfast selon vos préférences : ajouter ou retirer des ingrédients, changer les sauces, etc. Allergies, restrictions alimentaires, goûts personnels : notre équipe s\'adapte à vos besoins spécifiques.',
                'sort_order' => 14,
            ],
            [
                'category' => 'specialites',
                'category_label' => 'Nos Spécialités',
                'category_icon' => '🍔',
                'question' => 'Quels allergènes contient le Cheesecake Factory & Co ?',
                'answer' => 'Notre Cheesecake contient : <strong>gluten, produits laitiers, œufs</strong>. Traces possibles de <strong>noix</strong>. Pour une liste complète et détaillée de tous les allergènes présents dans chaque spécialité (burgers, bagels, etc.), consultez notre <a href="'.route('faq').'">FAQ complète des allergènes</a> ou demandez à notre équipe directement en restaurant.',
                'sort_order' => 15,
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
