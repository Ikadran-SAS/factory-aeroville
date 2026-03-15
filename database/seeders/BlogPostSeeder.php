<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        BlogPost::truncate();

        $posts = [
            [
                'title'            => '5 astuces pour bien profiter de Val d\'Europe',
                'slug'             => '5-astuces-val-europe',
                'category'         => 'Guide pratique',
                'excerpt'          => 'Vous visitez Val d\'Europe pour faire du shopping ou une visite à Disneyland Paris ? Voici nos 5 conseils d\'experts pour profiter au maximum du centre commercial et ses alentours.',
                'content'          => '<h2>1. Arrivez en RER E</h2><p>Le RER E est la solution la plus rapide et économique pour rejoindre Val d\'Europe depuis Paris. Depuis la Gare de l\'Est, direction Hausmann-St-Lazare, arrivée directe à la gare du Val d\'Europe en 25 minutes. Vous évitez les embouteillages et le stress du parking.</p><h2>2. Profitez du parking gratuit</h2><p>Tous les visiteurs du centre commercial Val d\'Europe bénéficient d\'un parking gratuit illimité. Plus besoin de stresser pour trouver une place ou de rajouter des frais à votre visite. C\'est l\'une des meilleures surprises du centre.</p><h2>3. Installez-vous chez Factory & Co</h2><p>Au cœur du centre commercial, Factory & Co vous accueille pour une pause gourmande. Commandez un bagel, un smash burger ou un cheesecake pendant que vous faites vos courses. Horaires étendus de 07h00 à 22h30.</p><h2>4. Profitez de la proximité de Disneyland Paris</h2><p>Val d\'Europe est à seulement quelques minutes de Disneyland Paris. Après une journée magique au parc, venez vous régaler chez Factory & Co avec nos menus gourmands, parfaits pour toute la famille.</p><h2>5. Utilisez le Click & Collect</h2><p>Commandez votre repas en ligne avant votre arrivée. Récupérez-le directement au comptoir sans attendre. Idéal pour les visiteurs pressés ou pour profiter au maximum de votre journée shopping !</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&q=80',
                'image_alt'        => 'Centre commercial Val d\'Europe',
                'meta_title'       => '5 astuces pour bien profiter de Val d\'Europe | Factory & Co',
                'meta_description' => 'Nos conseils pour optimiser votre visite à Val d\'Europe : RER E, parking gratuit, shopping, Disneyland Paris et Click & Collect.',
                'reading_time'     => '5 min de lecture',
                'is_featured'      => true,
                'is_published'     => true,
                'published_at'     => '2026-03-01',
                'sort_order'       => 1,
            ],
            [
                'title'            => 'Comment rejoindre Val d\'Europe en RER E ?',
                'slug'             => 'rer-e-val-europe-serris',
                'category'         => 'Accès & Transport',
                'excerpt'          => 'Le RER E est la solution la plus rapide et économique pour rejoindre Val d\'Europe depuis Paris. Départ depuis la Gare de l\'Est, arrivée à la gare du Val d\'Europe en 25 minutes.',
                'content'          => '<h2>Le RER E : votre meilleur allié</h2><p>Depuis la Gare de l\'Est à Paris, le RER E vous emmène directement à la gare du Val d\'Europe à Serris en seulement 25 minutes. Départ depuis le quai direction <strong>Hausmann-St-Lazare</strong>, arrivée directe à <strong>Gare du Val d\'Europe</strong>.</p><h2>Horaires et fréquences</h2><p>Le RER E fonctionne de 5h00 à 23h30, avec une fréquence de 10 minutes en heures de pointe et 20 minutes en heures creuses. Parfait pour une journée shopping ou une visite à Disneyland Paris.</p><h2>Tarifs</h2><p>Un ticket RATP T+ suffit : 2,50€ l\'unité ou 17€ le carnet de 10. Le ticket est valable 1h30 sur tout le réseau Île-de-France.</p><h2>Depuis la gare, comment rejoindre Factory & Co ?</h2><p>Depuis la Gare du Val d\'Europe, suivez les panneaux du centre commercial. Factory & Co se trouve au cœur du centre, 14 Rue du Danube à Serris. Accès direct sans passer la sécurité !</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&q=80',
                'image_alt'        => 'RER E Val d\'Europe Serris',
                'meta_title'       => 'RER E Val d\'Europe : guide complet | Factory & Co',
                'meta_description' => 'Comment rejoindre Val d\'Europe en RER E ? Horaires, tarifs, correspondances et accès direct au restaurant Factory & Co à Serris.',
                'reading_time'     => '5 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-02-15',
                'sort_order'       => 2,
            ],
            [
                'title'            => 'Pourquoi choisir un Smash Burger avant son vol ?',
                'slug'             => 'smash-burger-avant-vol-toulouse',
                'category'         => 'Gastronomie & Voyage',
                'excerpt'          => 'Contrairement aux idées reçues, un bon repas avant un vol améliore votre confort en cabine. Notre Smash Burger, riche en protéines et préparé à la minute, est l\'escale gourmande idéale.',
                'content'          => '<h2>Le mythe du repas léger avant le vol</h2><p>On entend souvent qu\'il vaut mieux manger léger avant de prendre l\'avion. En réalité, un repas équilibré et rassasiant vous aidera à mieux supporter la pressurisation de la cabine et à éviter les fringales en vol.</p><h2>Pourquoi le Smash Burger est idéal ?</h2><p>Notre <strong>Smash Burger</strong> est riche en protéines (bœuf français de qualité) et en glucides complexes (brioche artisanale). Cette combinaison vous apporte une énergie durable, parfaite pour un long vol. La technique de smashing sur plaque brûlante crée une croûte caramélisée incomparable.</p><h2>Préparé à la minute</h2><p>Contrairement aux fast-foods classiques qui réchauffent des burgers préparés à l\'avance, chez Factory & Co chaque burger est smashé à la commande. Résultat : une fraîcheur et une qualité incomparables, même en zone aéroportuaire.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80',
                'image_alt'        => 'Smash Burger Factory & Co avant un vol',
                'meta_title'       => 'Smash Burger avant une visite : pourquoi c\'est une bonne idée | Factory & Co Val d\'Europe',
                'meta_description' => 'Découvrez pourquoi le Smash Burger de Factory & Co est le repas idéal avant une journée shopping à Val d\'Europe.',
                'reading_time'     => '4 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-02-10',
                'sort_order'       => 3,
            ],
            [
                'title'            => 'Comment transporter son cheesecake en avion ?',
                'slug'             => 'transporter-cheesecake-avion',
                'category'         => 'Conseils Pratiques',
                'excerpt'          => 'Nos coffrets cheesecake sont conçus pour voyager avec vous. Découvrez nos conseils pour transporter votre pâtisserie en cabine sans risque.',
                'content'          => '<h2>Le cheesecake en cabine : c\'est possible !</h2><p>Bonne nouvelle : vous pouvez tout à fait emporter un cheesecake en cabine d\'avion, à condition de respecter quelques règles simples. Nos coffrets sont spécialement conçus pour le transport.</p><h2>Les règles à connaître</h2><p>Les aliments solides sont autorisés en cabine sans restriction de quantité. Le cheesecake, étant un aliment solide, ne tombe pas sous la règle des liquides (100ml). En revanche, si vous voyagez hors de l\'espace Schengen, renseignez-vous sur les restrictions douanières du pays de destination.</p><h2>Nos coffrets de voyage</h2><p>Nos <strong>Coffrets 4 Parts</strong> sont conditionnés dans une boîte isotherme rigide qui maintient le cheesecake frais pendant 4 à 6 heures. Parfait pour un vol court ou moyen-courrier. Pour les vols long-courriers, nous recommandons de le consommer avant l\'embarquement.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80',
                'image_alt'        => 'Coffret cheesecake à emporter Factory & Co',
                'meta_title'       => 'Transporter un cheesecake en avion : nos conseils | Factory & Co',
                'meta_description' => 'Peut-on emporter un cheesecake en cabine d\'avion ? Oui ! Découvrez nos conseils et nos coffrets voyage Factory & Co Val d\'Europe.',
                'reading_time'     => '3 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-01-20',
                'sort_order'       => 4,
            ],
            [
                'title'            => 'Le meilleur petit-déjeuner américain à Val d\'Europe',
                'slug'             => 'petit-dejeuner-americain-val-europe',
                'category'         => 'Breakfast & Brunch',
                'excerpt'          => 'Ouverts dès 07h00, nous sommes l\'adresse incontournable pour un vrai breakfast américain : bagels frais, œufs brouillés, bacon croustillant et café de qualité.',
                'content'          => '<h2>Un breakfast digne de New York à Serris</h2><p>Chez Factory & Co, le petit-déjeuner est une institution. Depuis 2008, nous préparons chaque matin des bagels frais, des œufs brouillés onctueux et du bacon croustillant, comme dans les diners new-yorkais que le chef Jonathan Jablonski affectionne.</p><h2>Notre sélection breakfast</h2><p>Dès 07h00, retrouvez notre <strong>Egg & Bacon Bagel</strong> (œuf brouillé, bacon, cheddar, sauce hollandaise), notre <strong>Smoothie Bowl</strong> (fruits frais, granola, chia) et notre sélection de cafés de spécialité. Le tout préparé à la minute, jamais réchauffé.</p><h2>Idéal avant une journée shopping</h2><p>Vous avez une longue journée shopping en perspective ? Arrivez chez nous dès l\'ouverture et installez-vous pour un breakfast complet avant de commencer vos courses. Nos équipes sont formées pour servir rapidement sans sacrifier la qualité.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1509722747041-616f39b57569?w=600&q=80',
                'image_alt'        => 'Petit-déjeuner américain bagel Factory & Co Val d\'Europe',
                'meta_title'       => 'Meilleur petit-déjeuner américain Val d\'Europe | Factory & Co',
                'meta_description' => 'Factory & Co propose le meilleur breakfast américain de Val d\'Europe : bagels frais, œufs, bacon, café — dès 07h00 à Serris.',
                'reading_time'     => '4 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2026-03-01',
                'sort_order'       => 5,
            ],
            [
                'title'            => 'L\'histoire de Factory & Co : de New York à Val d\'Europe',
                'slug'             => 'histoire-factory-co-new-york-val-europe',
                'category'         => 'Histoire & Concept',
                'excerpt'          => 'Comment le chef Jonathan Jablonski a-t-il apporté l\'ADN authentique du diner new-yorkais au cœur de Val d\'Europe ? Retour sur 15 ans de passion culinaire.',
                'content'          => '<h2>L\'origine : New York, 2005</h2><p>Tout commence en 2005, quand Jonathan Jablonski, jeune chef passionné originaire de Varsovie, débarque à New York pour parfaire sa formation culinaire. Il passe 3 ans à travailler dans les meilleurs diners de Brooklyn et du Lower East Side, absorbant les techniques du smash burger, du bagel authentique et du cheesecake new-yorkais.</p><h2>L\'idée : transporter New York en France</h2><p>De retour en France en 2008, Jonathan a une vision claire : créer un concept de restauration rapide qui ne sacrifie pas la qualité. Il choisit l\'Aéroport Toulouse-Blagnac, carrefour international, comme premier emplacement. Factory & Co est né.</p><h2>Aujourd\'hui : une référence du fast-casual en Île-de-France</h2><p>15 ans plus tard, Factory & Co s\'est implanté à Val d\'Europe à Serris. Avec plus de 320 avis Google et une note de 4,5/5, le restaurant prouve qu\'il est possible de manger vraiment bien en centre commercial. Une expansion naturelle pour ce concept qui a conquis les voyageurs et les visiteurs.</p>',
                'image_url'        => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80',
                'image_alt'        => 'Ambiance diner américain Factory & Co Val d\'Europe',
                'meta_title'       => 'L\'histoire de Factory & Co : de New York à Val d\'Europe | Blog',
                'meta_description' => 'Découvrez l\'histoire de Factory & Co, fondé par le chef Jonathan Jablonski en 2008. Du diner new-yorkais au centre commercial Val d\'Europe à Serris.',
                'reading_time'     => '7 min de lecture',
                'is_featured'      => false,
                'is_published'     => true,
                'published_at'     => '2025-12-15',
                'sort_order'       => 6,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::create($data);
        }

        $this->command->info('✅ ' . count($posts) . ' articles de blog insérés.');
    }
}
