<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

/**
 * Seeder de production Factory & Co Aéroville.
 *
 * Utilise updateOrCreate pour être idempotent :
 * peut être relancé sans risque de doublon ni perte de données.
 *
 * Usage : php artisan db:seed --class=ProductionSeeder
 */
class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('');
        $this->command->info('🍔 Factory & Co Aéroville — Seeding PRODUCTION...');
        $this->command->info('');

        $this->seedOpeningHours();
        $this->seedFaqs();
        $this->seedProducts();
        $this->seedReviews();

        $this->command->info('');
        $this->command->info('✅ Production seedée avec succès !');
        $this->command->table(
            ['Table', 'Total'],
            [
                ['opening_hours', OpeningHour::count()],
                ['faq_items', FaqItem::count()],
                ['products', Product::count()],
                ['reviews', Review::count()],
            ]
        );
    }

    private function seedOpeningHours(): void
    {
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
            OpeningHour::updateOrCreate(
                ['days_label' => $data['days_label']],
                $data
            );
        }

        $this->command->info('  ✓ Horaires d\'ouverture');
    }

    private function seedFaqs(): void
    {
        $faqs = [
            // ACCÈS
            ['category' => 'acces', 'category_label' => 'Accès & Localisation', 'category_icon' => '📍', 'question' => 'Où se trouve Factory & Co à Aéroville ?', 'answer' => 'Factory & Co est situé <strong>au cœur</strong> du CC Westfield Aéroville, <strong>30 Rue des Buissons, 93290 Tremblay-en-France</strong>. Le restaurant est accessible depuis le parking du centre (4 000+ places, 3 h gratuites), le <strong>RER B</strong> (gare Parc des Expositions) ou la <strong>navette gratuite depuis l\'aéroport CDG</strong>.', 'sort_order' => 1],
            ['category' => 'acces', 'category_label' => 'Accès & Localisation', 'category_icon' => '📍', 'question' => 'Comment venir à Aéroville en transports en commun ?', 'answer' => '<strong>En RER B</strong> : descendez à la gare <strong>Parc des Expositions</strong>, le centre commercial est à quelques minutes à pied.<br><strong>En bus</strong> : lignes <strong>350</strong> et <strong>351</strong> desservent directement Aéroville.<br><strong>Depuis l\'aéroport CDG</strong> : navette gratuite depuis les terminaux.<br><strong>En voiture</strong> : accès par l\'A1 ou l\'A3, parking de 4 000+ places (3 h gratuites).', 'sort_order' => 2],
            ['category' => 'acces', 'category_label' => 'Accès & Localisation', 'category_icon' => '📍', 'question' => 'Le restaurant est-il accessible aux personnes à mobilité réduite ?', 'answer' => 'Oui, Factory & Co est entièrement accessible aux personnes à mobilité réduite (PMR). Le centre commercial Westfield Aéroville dispose d\'ascenseurs, de rampes d\'accès et de places de parking réservées. Notre comptoir est adapté et notre équipe est formée pour accueillir tous nos clients.', 'sort_order' => 3],

            // HORAIRES
            ['category' => 'horaires', 'category_label' => 'Horaires & Service', 'category_icon' => '🕐', 'question' => 'Quels sont les horaires d\'ouverture de Factory & Co Aéroville ?', 'answer' => 'Factory & Co Aéroville est ouvert <strong>7 jours sur 7</strong> :<br>• Dimanche à Jeudi : <strong>8 h 30 – 22 h 00</strong><br>• Vendredi – Samedi : <strong>8 h 30 – 23 h 00</strong>', 'sort_order' => 4],
            ['category' => 'horaires', 'category_label' => 'Horaires & Service', 'category_icon' => '🕐', 'question' => 'Le restaurant est-il ouvert les jours fériés ?', 'answer' => 'Oui, Factory & Co Aéroville est ouvert <strong>tous les jours fériés</strong> sans exception, y compris Noël, le Jour de l\'An et le 14 juillet. Les horaires peuvent être légèrement ajustés selon les horaires du centre commercial.', 'sort_order' => 5],
            ['category' => 'horaires', 'category_label' => 'Horaires & Service', 'category_icon' => '🕐', 'question' => 'Puis-je prendre un petit-déjeuner chez Factory & Co ?', 'answer' => 'Absolument ! Nous ouvrons à <strong>8 h 30</strong> tous les jours. Notre offre breakfast (bagels frais, pancakes, viennoiseries, cafés de spécialité) est disponible dès l\'ouverture. Idéal avant une journée de shopping à Aéroville ou une séance au Pathé !', 'sort_order' => 6],

            // ALLERGÈNES
            ['category' => 'allergenes', 'category_label' => 'Allergènes & Régimes', 'category_icon' => '🌿', 'question' => 'Vos produits sont-ils Halal ?', 'answer' => 'Oui, chez Factory & Co <strong>l\'ensemble de notre viande est Halal</strong>. Ce n\'est pas une option à part : c\'est notre offre standard, naturellement intégrée à toute la carte. Smash Burgers, bagels, bowls — tous nos plats à base de viande sont préparés avec de la viande Halal certifiée.', 'sort_order' => 7],
            ['category' => 'allergenes', 'category_label' => 'Allergènes & Régimes', 'category_icon' => '🌿', 'question' => 'Y a-t-il des options végétariennes et véganes ?', 'answer' => 'Oui, nous proposons plusieurs options végétariennes et véganes : <strong>Veggie Smash Burger</strong>, <strong>Veggie Bagel</strong>, <strong>Super Bowl Quinoa</strong>, <strong>Veggie Bowl</strong> et <strong>Smoothie Bowl</strong>. Tous nos cheesecakes sont végétariens.', 'sort_order' => 8],
            ['category' => 'allergenes', 'category_label' => 'Allergènes & Régimes', 'category_icon' => '🌿', 'question' => 'Comment obtenir la liste complète des allergènes ?', 'answer' => 'La liste complète des allergènes est disponible sur notre carte en restaurant et sur notre site web. Les 14 allergènes majeurs (gluten, lait, œufs, arachides, noix, soja, poisson, crustacés, céleri, moutarde, sésame, lupin, mollusques, anhydride sulfureux) sont clairement indiqués pour chaque produit. N\'hésitez pas à demander à notre équipe.', 'sort_order' => 9],
            ['category' => 'allergenes', 'category_label' => 'Allergènes & Régimes', 'category_icon' => '🌿', 'question' => 'Proposez-vous des options sans gluten ?', 'answer' => 'Nous proposons plusieurs plats naturellement sans gluten : nos <strong>bowls</strong> (quinoa, riz brun), nos <strong>salades</strong> et certains <strong>cheesecakes</strong>. En revanche, notre cuisine n\'est pas certifiée « sans gluten » : des traces peuvent être présentes en raison de la manipulation en cuisine.', 'sort_order' => 10],

            // COMMANDE
            ['category' => 'commande', 'category_label' => 'Commande & Paiement', 'category_icon' => '📦', 'question' => 'Comment fonctionne le Click & Collect chez Factory & Co ?', 'answer' => 'Le Click & Collect vous permet de <strong>commander et payer en ligne</strong> avant votre arrivée. Indiquez l\'heure de récupération souhaitée et récupérez votre commande directement au comptoir sans attendre. Idéal pour les shoppers pressés ou avant de reprendre la navette vers CDG !', 'sort_order' => 11],
            ['category' => 'commande', 'category_label' => 'Commande & Paiement', 'category_icon' => '📦', 'question' => 'Quels moyens de paiement acceptez-vous ?', 'answer' => 'Nous acceptons toutes les cartes bancaires (Visa, Mastercard, American Express), les paiements sans contact (Apple Pay, Google Pay, Samsung Pay) et les espèces en euros. Nous n\'acceptons pas les chèques.', 'sort_order' => 12],

            // SPÉCIALITÉS — SEO localisé
            ['category' => 'specialites', 'category_label' => 'Nos Spécialités', 'category_icon' => '🍔', 'question' => 'Où manger un vrai smash burger à Aéroville ?', 'answer' => 'Chez <strong>Factory & Co au CC Westfield Aéroville</strong> (30 Rue des Buissons, 93290 Tremblay-en-France), nos smash burgers sont préparés devant vous : viande Halal certifiée, smashée sur plaque brûlante à 200 °C, cheddar fondant et brioche dorée. Accessible en <strong>RER B</strong> (gare Parc des Expositions), en bus 350/351 ou en voiture (parking 3 h gratuites). Ouvert 7j/7 dès 8 h 30.', 'sort_order' => 13],
            ['category' => 'specialites', 'category_label' => 'Nos Spécialités', 'category_icon' => '🍔', 'question' => 'Peut-on prendre un petit-déjeuner américain près de l\'aéroport CDG ?', 'answer' => 'Oui ! Factory & Co Aéroville ouvre <strong>dès 8 h 30, 7j/7</strong>. Bagels frais du jour, pancakes, viennoiseries et cafés de spécialité vous attendent au CC Westfield Aéroville, à quelques minutes de l\'aéroport Paris-CDG via la <strong>navette gratuite</strong> ou le <strong>RER B</strong>. Idéal avant un vol ou en début de journée shopping.', 'sort_order' => 14],
            ['category' => 'specialites', 'category_label' => 'Nos Spécialités', 'category_icon' => '🍔', 'question' => 'Quels cheesecakes sont disponibles chez Factory & Co Aéroville ?', 'answer' => 'Notre carte de cheesecakes comprend : <strong>New-Yorkais Classique</strong>, <strong>Framboise–Chocolat Blanc</strong>, <strong>Oreo</strong>, <strong>Kinder Bueno</strong> et <strong>Spéculoos</strong>. Tous sont préparés chaque jour dans notre restaurant du CC Westfield Aéroville. Nous proposons aussi un <strong>Coffret 4 Parts à emporter</strong>, parfait avant un vol depuis CDG. Allergènes : gluten, lait, œufs (traces de noix possibles).', 'sort_order' => 15],
            ['category' => 'specialites', 'category_label' => 'Nos Spécialités', 'category_icon' => '🍔', 'question' => 'Les burgers de Factory & Co Aéroville sont-ils Halal ?', 'answer' => 'Oui, chez Factory & Co <strong>l\'ensemble de notre viande est Halal certifiée</strong>. Ce n\'est pas une option : c\'est notre standard sur toute la carte. Smash Burgers, bagels garnis, bowls — vous pouvez commander en toute confiance. Retrouvez-nous au <strong>CC Westfield Aéroville, 30 Rue des Buissons, 93290 Tremblay-en-France</strong>.', 'sort_order' => 16],
        ];

        foreach ($faqs as $data) {
            FaqItem::updateOrCreate(
                ['question' => $data['question']],
                $data
            );
        }

        $this->command->info('  ✓ FAQ ('.count($faqs).' questions)');
    }

    private function seedProducts(): void
    {
        $products = [
            // BURGERS
            ['name' => "Champion's Smash", 'category' => 'burgers', 'subcategory' => 'smash', 'description' => 'Triple steak smashé, triple cheddar, bacon croustillant, sauce secrète maison, cornichons, oignon caramélisé', 'price' => 18.90, 'badge' => 'Best-seller', 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'œufs', 'moutarde'], 'sort_order' => 1],
            ['name' => 'Classic Smash', 'category' => 'burgers', 'subcategory' => 'smash', 'description' => 'Bœuf smashé, cheddar fondu, salade, tomate, oignon, sauce maison', 'price' => 12.90, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs', 'moutarde'], 'sort_order' => 2],
            ['name' => 'Halal Smash', 'category' => 'burgers', 'subcategory' => 'halal', 'description' => 'Bœuf Halal certifié, cheddar fondu, cornichons, sauce barbecue maison', 'price' => 13.90, 'badge' => 'Halal', 'badge_color' => 'green', 'image_url' => 'https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'moutarde'], 'sort_order' => 3],
            ['name' => 'Veggie Smash', 'category' => 'burgers', 'subcategory' => 'veggie', 'description' => 'Galette végétale, cheddar vegan, avocat, roquette, sauce citron', 'price' => 12.90, 'badge' => 'Végétarien', 'badge_color' => 'green', 'image_url' => 'https://images.unsplash.com/photo-1607013251379-e6eecfffe234?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'céleri'], 'sort_order' => 4],
            ['name' => 'Double Smash', 'category' => 'burgers', 'subcategory' => 'smash', 'description' => '2 steaks smashés, double cheddar, sauce spéciale, cornichons, oignon', 'price' => 15.90, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1561758033-d89a9ad46330?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs', 'moutarde'], 'sort_order' => 5],
            ['name' => 'Kids Burger', 'category' => 'burgers', 'subcategory' => 'kids', 'description' => 'Mini burger, frites maison, boisson au choix', 'price' => 8.90, 'badge' => 'Menu Enfant', 'badge_color' => 'dark', 'image_url' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten', 'lait'], 'sort_order' => 6],

            // BAGELS
            ['name' => 'Egg & Bacon Bagel', 'category' => 'bagels', 'subcategory' => 'chaud', 'description' => 'Œuf brouillé, bacon croustillant, cheddar fondu, sauce hollandaise', 'price' => 9.90, 'badge' => 'Breakfast', 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1509722747041-616f39b57569?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'œufs'], 'sort_order' => 10],
            ['name' => 'Lost Bagel', 'category' => 'bagels', 'subcategory' => 'froid', 'description' => 'Saumon fumé, cream cheese, câpres, oignon rouge, aneth frais', 'price' => 11.90, 'badge' => 'Signature', 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1565299507177-b0ac66763828?w=600&q=80', 'is_halal' => false, 'is_vegetarian' => false, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'poisson', 'sésame'], 'sort_order' => 11],
            ['name' => 'Chicken Avocado', 'category' => 'bagels', 'subcategory' => 'chaud', 'description' => 'Poulet grillé, avocat, tomate, roquette, mayonnaise citron', 'price' => 10.90, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten', 'œufs', 'moutarde'], 'sort_order' => 12],
            ['name' => 'Veggie Bagel', 'category' => 'bagels', 'subcategory' => 'veggie', 'description' => 'Houmous maison, légumes grillés, roquette, tomates séchées', 'price' => 9.50, 'badge' => 'Végétarien', 'badge_color' => 'green', 'image_url' => 'https://images.unsplash.com/photo-1484723091739-30a097e8f929?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'sésame', 'céleri'], 'sort_order' => 13],
            ['name' => 'Build Your Own Bagel', 'category' => 'bagels', 'subcategory' => 'compose', 'description' => 'Composez votre bagel parmi 12 ingrédients frais au choix', 'price' => 8.50, 'badge' => 'Personnalisé', 'badge_color' => 'dark', 'image_url' => 'https://images.unsplash.com/photo-1528735602780-2552fd46c7af?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten'], 'sort_order' => 14],

            // CHEESECAKE
            ['name' => 'New-Yorkais Classique', 'category' => 'cheesecake', 'subcategory' => 'classique', 'description' => 'Recette traditionnelle Factory & Co, base biscuitée croustillante, texture crémeuse sans gélatine', 'price' => 6.90, 'badge' => 'Signature', 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'œufs'], 'sort_order' => 20],
            ['name' => 'Framboise – Chocolat Blanc', 'category' => 'cheesecake', 'subcategory' => 'fruité', 'description' => 'Coulis de framboise fraîche, ganache chocolat blanc, base biscuitée', 'price' => 7.50, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs'], 'sort_order' => 21],
            ['name' => 'Oreo', 'category' => 'cheesecake', 'subcategory' => 'gourmand', 'description' => 'Biscuits Oreo croustillants, crème onctueuse, topping Oreo concassé', 'price' => 7.50, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs', 'soja'], 'sort_order' => 22],
            ['name' => 'Kinder Bueno', 'category' => 'cheesecake', 'subcategory' => 'gourmand', 'description' => 'Chocolat noisette, wafer croustillant, onctuosité maximale', 'price' => 7.50, 'badge' => 'Coup de cœur', 'badge_color' => 'dark', 'image_url' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => true, 'allergens' => ['gluten', 'lait', 'œufs', 'noisettes', 'soja'], 'sort_order' => 23],
            ['name' => 'Spéculoos', 'category' => 'cheesecake', 'subcategory' => 'classique', 'description' => 'Base spéculoos, caramel beurre salé, épices douces', 'price' => 7.50, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs', 'soja'], 'sort_order' => 24],
            ['name' => 'Coffret 4 Parts', 'category' => 'cheesecake', 'subcategory' => 'emporter', 'description' => '4 parts assorties à emporter dans un coffret cadeau', 'price' => 24.00, 'badge' => 'À emporter', 'badge_color' => 'dark', 'image_url' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs'], 'sort_order' => 25],

            // BOWLS
            ['name' => 'Super Bowl Quinoa', 'category' => 'bowls', 'subcategory' => 'vegan', 'description' => 'Quinoa, avocat, edamame, carottes râpées, graines de courge, sauce tahini', 'price' => 13.50, 'badge' => 'Vegan', 'badge_color' => 'green', 'image_url' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => true, 'allergens' => ['sésame', 'céleri'], 'sort_order' => 30],
            ['name' => 'Chicken Power Bowl', 'category' => 'bowls', 'subcategory' => 'proteine', 'description' => 'Poulet grillé, riz brun, légumes rôtis de saison, sauce yaourt-citron', 'price' => 14.50, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['lait'], 'sort_order' => 31],
            ['name' => 'Salade César', 'category' => 'bowls', 'subcategory' => 'salade', 'description' => 'Poulet croustillant, parmesan, croûtons maison, sauce César', 'price' => 12.90, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['gluten', 'lait', 'œufs', 'poisson', 'moutarde'], 'sort_order' => 32],
            ['name' => 'Salade Saumon', 'category' => 'bowls', 'subcategory' => 'salade', 'description' => 'Saumon fumé, avocat, concombre, radis, vinaigrette agrumes', 'price' => 13.90, 'badge' => null, 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80', 'is_halal' => false, 'is_vegetarian' => false, 'is_featured' => false, 'allergens' => ['poisson'], 'sort_order' => 33],
            ['name' => 'Veggie Bowl', 'category' => 'bowls', 'subcategory' => 'veggie', 'description' => 'Pois chiches rôtis, betterave, épinards, grenade, houmous maison', 'price' => 12.50, 'badge' => 'Végétarien', 'badge_color' => 'green', 'image_url' => 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['sésame', 'céleri'], 'sort_order' => 34],
            ['name' => 'Smoothie Bowl', 'category' => 'bowls', 'subcategory' => 'breakfast', 'description' => 'Fruits frais mixés, granola croustillant, graines de chia, miel', 'price' => 8.90, 'badge' => 'Breakfast', 'badge_color' => 'pink', 'image_url' => 'https://images.unsplash.com/photo-1494390248081-4e521a5940db?w=600&q=80', 'is_halal' => true, 'is_vegetarian' => true, 'is_featured' => false, 'allergens' => ['gluten', 'noix'], 'sort_order' => 35],
        ];

        foreach ($products as $data) {
            $data['slug'] = Str::slug($data['name']);
            Product::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }

        $this->command->info('  ✓ Produits ('.count($products).' articles)');
    }

    private function seedReviews(): void
    {
        $this->command->info('  Synchronisation des vrais avis Google Places...');

        Artisan::call('reviews:sync-google', [], $this->command->getOutput());
    }
}
