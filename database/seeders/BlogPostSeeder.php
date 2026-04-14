<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        BlogPost::truncate();

        $posts = [
            [
                'title' => '5 astuces pour bien profiter d\'Aéroville',
                'slug' => '5-astuces-aeroville',
                'category' => 'Guide pratique',
                'excerpt' => 'Vous visitez le CC Westfield Aéroville pour faire du shopping ou une séance au Pathé ? Voici nos 5 conseils d\'experts pour profiter au maximum du centre commercial et ses alentours.',
                'content' => '<h2>1. Venez en RER B</h2><p>Le RER B est la solution la plus rapide et économique pour rejoindre Aéroville depuis Paris. Descendez à la gare Parc des Expositions, le centre commercial est à quelques minutes à pied. Vous pouvez aussi emprunter les bus 350 et 351, ou la navette gratuite depuis l\'aéroport CDG.</p><h2>2. Profitez du parking gratuit</h2><p>Le CC Westfield Aéroville dispose de plus de 4000 places de parking avec 3 heures gratuites. En voiture, accès facile par l\'A1 ou l\'A3. Plus besoin de stresser pour trouver une place !</p><h2>3. Installez-vous chez Factory & Co</h2><p>Au cœur du centre commercial, Factory & Co vous accueille pour une pause gourmande. Commandez un bagel, un smash burger ou un cheesecake pendant que vous faites vos courses. Ouvert 7j/7, de 8h30 à 22h (23h les vendredis et samedis).</p><h2>4. Profitez du Pathé Aéroville</h2><p>Aéroville abrite le cinéma Pathé avec ses 12 salles, dont Dolby et 4DX. Après une séance, venez vous régaler chez Factory & Co avec nos menus gourmands, parfaits pour toute la famille.</p><h2>5. Utilisez le Click & Collect</h2><p>Commandez votre repas en ligne avant votre arrivée. Récupérez-le directement au comptoir sans attendre. Idéal pour les visiteurs pressés, les voyageurs en transit depuis CDG ou pour profiter au maximum de votre journée shopping !</p>',
                'image_url' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=800&q=80',
                'image_alt' => 'Centre commercial Westfield Aéroville',
                'meta_title' => '5 astuces pour bien profiter d\'Aéroville | Factory & Co',
                'meta_description' => 'Nos conseils pour optimiser votre visite à Aéroville : RER B, parking gratuit, shopping, Pathé Aéroville et Click & Collect.',
                'reading_time' => '5 min de lecture',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => '2026-03-01',
                'sort_order' => 1,
            ],
            [
                'title' => 'Comment venir à Aéroville en transports ?',
                'slug' => 'transports-aeroville-tremblay',
                'category' => 'Accès & Transport',
                'excerpt' => 'RER B, bus 350/351, navette gratuite depuis CDG ou voiture via A1/A3 : découvrez tous les moyens de rejoindre le CC Westfield Aéroville à Tremblay-en-France.',
                'content' => '<h2>Le RER B : votre meilleur allié</h2><p>Depuis Paris, le RER B direction aéroport Charles-de-Gaulle vous dépose à la gare <strong>Parc des Expositions</strong>. Le CC Westfield Aéroville est accessible à pied en quelques minutes depuis la gare.</p><h2>Bus et navette CDG</h2><p>Les <strong>bus 350 et 351</strong> desservent le secteur d\'Aéroville. Si vous arrivez de l\'aéroport CDG, une <strong>navette gratuite</strong> relie les terminaux au centre commercial. Idéal pour les voyageurs internationaux en escale ou en transit.</p><h2>En voiture</h2><p>Aéroville est directement accessible par l\'<strong>A1</strong> et l\'<strong>A3</strong>. Le centre dispose de plus de <strong>4000 places de parking</strong> avec 3 heures gratuites. Largement de quoi profiter de votre repas et de votre shopping.</p><h2>Depuis le centre, comment rejoindre Factory & Co ?</h2><p>Une fois dans le CC Westfield Aéroville, Factory & Co se trouve au cœur du centre, 30 Rue des Buissons à Tremblay-en-France. Impossible de le manquer !</p>',
                'image_url' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&q=80',
                'image_alt' => 'Transports vers Aéroville Tremblay-en-France',
                'meta_title' => 'Comment venir à Aéroville : guide transports | Factory & Co',
                'meta_description' => 'Comment venir à Aéroville ? RER B Parc des Expositions, bus 350/351, navette CDG gratuite et parking 4000 places. Accès direct à Factory & Co.',
                'reading_time' => '5 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-15',
                'sort_order' => 2,
            ],
            [
                'title' => 'Pourquoi choisir un Smash Burger avant une journée shopping ?',
                'slug' => 'smash-burger-avant-shopping-aeroville',
                'category' => 'Gastronomie & Voyage',
                'excerpt' => 'Avant une longue journée shopping à Aéroville, un bon repas équilibré vous aide à garder l\'énergie. Notre Smash Burger, riche en protéines et préparé à la minute, est la pause gourmande idéale.',
                'content' => '<h2>L\'importance d\'une bonne pause déjeuner</h2><p>Passer une journée entière shopping sans manger correctement vous épuisera rapidement. Un repas équilibré vous permettra de conserver votre énergie et votre bonne humeur tout au long de votre visite à Aéroville.</p><h2>Pourquoi le Smash Burger est idéal ?</h2><p>Notre <strong>Smash Burger</strong> est riche en protéines (bœuf français de qualité) et en glucides complexes (brioche artisanale). Cette combinaison vous apporte une énergie durable, parfaite pour continuer vos courses. La technique de smashing sur plaque brûlante crée une croûte caramélisée incomparable.</p><h2>Préparé à la minute</h2><p>Contrairement aux fast-foods classiques qui réchauffent des burgers préparés à l\'avance, chez Factory & Co chaque burger est smashé à la commande. Résultat : une fraîcheur et une qualité incomparables, idéal pour une pause gourmande en centre commercial.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80',
                'image_alt' => 'Smash Burger Factory & Co Aéroville',
                'meta_title' => 'Smash Burger avant une journée shopping : pourquoi c\'est une bonne idée | Factory & Co Aéroville',
                'meta_description' => 'Découvrez pourquoi le Smash Burger de Factory & Co est le repas idéal avant une journée shopping à Aéroville.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-02-10',
                'sort_order' => 3,
            ],
            [
                'title' => 'Comment transporter son cheesecake en avion ?',
                'slug' => 'transporter-cheesecake-avion',
                'category' => 'Conseils Pratiques',
                'excerpt' => 'Factory & Co est à quelques minutes de l\'aéroport CDG : nos coffrets cheesecake sont conçus pour voyager avec vous. Découvrez nos conseils pour transporter votre pâtisserie en cabine sans risque.',
                'content' => '<h2>Le cheesecake en cabine : c\'est possible !</h2><p>Bonne nouvelle : vous pouvez tout à fait emporter un cheesecake en cabine d\'avion, à condition de respecter quelques règles simples. Nos coffrets sont spécialement conçus pour le transport. Et comme Factory & Co se trouve au CC Westfield Aéroville, à quelques minutes de l\'aéroport Paris-CDG, c\'est l\'arrêt gourmand idéal avant votre vol !</p><h2>Les règles à connaître</h2><p>Les aliments solides sont autorisés en cabine sans restriction de quantité. Le cheesecake, étant un aliment solide, ne tombe pas sous la règle des liquides (100ml). En revanche, si vous voyagez hors de l\'espace Schengen, renseignez-vous sur les restrictions douanières du pays de destination.</p><h2>Nos coffrets de voyage</h2><p>Nos <strong>Coffrets 4 Parts</strong> sont conditionnés dans une boîte isotherme rigide qui maintient le cheesecake frais pendant 4 à 6 heures. Parfait pour un vol court ou moyen-courrier depuis CDG. Pour les vols long-courriers, nous recommandons de le consommer avant l\'embarquement.</p><h2>L\'avantage Aéroville</h2><p>Grâce à notre emplacement au CC Westfield Aéroville, vous pouvez récupérer votre coffret cheesecake en Click & Collect juste avant de rejoindre l\'aéroport CDG via la navette gratuite ou le RER B. Un souvenir gourmand de Paris à emporter dans vos bagages !</p>',
                'image_url' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80',
                'image_alt' => 'Coffret cheesecake à emporter Factory & Co Aéroville',
                'meta_title' => 'Transporter un cheesecake en avion : nos conseils | Factory & Co Aéroville',
                'meta_description' => 'Près de l\'aéroport CDG, Factory & Co Aéroville propose des coffrets cheesecake à emporter en cabine. Nos conseils pour voyager avec votre pâtisserie.',
                'reading_time' => '3 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-01-20',
                'sort_order' => 4,
            ],
            [
                'title' => 'Le meilleur petit-déjeuner américain à Aéroville',
                'slug' => 'petit-dejeuner-americain-aeroville',
                'category' => 'Breakfast & Brunch',
                'excerpt' => 'Ouverts dès 8h30, nous sommes l\'adresse incontournable pour un vrai breakfast américain : bagels frais, pancakes, viennoiseries et café de qualité.',
                'content' => '<h2>Un breakfast digne de New York à Tremblay-en-France</h2><p>Chez Factory & Co, le petit-déjeuner est une institution. Depuis 1989, nous perpétuons la tradition des diners new-yorkais : chaque matin, des bagels frais, des pancakes dorés et du café de spécialité vous attendent.</p><h2>Notre sélection breakfast</h2><p>Dès 8h30, retrouvez notre <strong>Egg & Bacon Bagel</strong> (œuf brouillé, bacon, cheddar, sauce hollandaise), nos <strong>Pancakes</strong> (x2 avec spécialité coffeeshop) et notre sélection de cafés de spécialité. Le tout préparé à la minute, jamais réchauffé.</p><h2>Idéal avant une journée shopping ou un vol</h2><p>Vous avez une longue journée shopping en perspective ou un vol à prendre depuis CDG ? Arrivez chez nous dès l\'ouverture et installez-vous pour un breakfast complet avant de commencer vos courses ou de rejoindre l\'aéroport. Nos équipes sont formées pour servir rapidement sans sacrifier la qualité.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1509722747041-616f39b57569?w=600&q=80',
                'image_alt' => 'Petit-déjeuner américain bagel Factory & Co Aéroville',
                'meta_title' => 'Meilleur petit-déjeuner américain Aéroville | Factory & Co',
                'meta_description' => 'Factory & Co propose le meilleur breakfast américain d\'Aéroville : bagels frais, œufs, bacon, café — dès 8h30 à Tremblay-en-France.',
                'reading_time' => '4 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2026-03-01',
                'sort_order' => 5,
            ],
            [
                'title' => 'L\'histoire de Factory & Co : de New York à Aéroville',
                'slug' => 'histoire-factory-co-new-york-aeroville',
                'category' => 'Histoire & Concept',
                'excerpt' => 'Comment Factory & Co a-t-il apporté l\'ADN authentique du diner new-yorkais au cœur d\'Aéroville ? Retour sur plus de 10 ans de passion culinaire.',
                'content' => '<h2>L\'origine : New York, 2005</h2><p>Tout commence en 2005, quand un passionné de cuisine new-yorkaise débarque à New York pour parfaire sa formation culinaire. Pendant 3 ans, notre équipe fondatrice travaille dans les meilleurs diners de Brooklyn et du Lower East Side, absorbant les techniques du smash burger, du bagel authentique et du cheesecake new-yorkais.</p><h2>L\'idée : transporter New York en France</h2><p>De retour en France en 2008, notre équipe a une vision claire : créer un concept de restauration rapide qui ne sacrifie pas la qualité. En 2013, Factory & Co choisit le tout nouveau CC Westfield Aéroville à Tremblay-en-France, un carrefour stratégique aux portes de l\'aéroport Paris-CDG et du parc des expositions, comme lieu idéal pour s\'implanter. Un choix visionnaire pour ce projet culinaire tourné vers les voyageurs internationaux.</p><h2>Aujourd\'hui : une référence du fast-casual en Île-de-France</h2><p>Depuis 2013, Factory & Co à Aéroville s\'est implanté au cœur du centre commercial. Avec plus de 320 avis Google et une note de 4,8/5, le restaurant prouve qu\'il est possible de manger vraiment bien en centre commercial. Une réussite naturelle pour ce concept qui a conquis les visiteurs, les shopping-addicts et les voyageurs en transit depuis l\'aéroport CDG.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80',
                'image_alt' => 'Ambiance diner américain Factory & Co Aéroville',
                'meta_title' => 'L\'histoire de Factory & Co : de New York à Aéroville | Blog',
                'meta_description' => 'Découvrez l\'histoire de Factory & Co, implanté au CC Westfield Aéroville depuis 2013. Du diner new-yorkais à Tremblay-en-France.',
                'reading_time' => '7 min de lecture',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => '2025-12-15',
                'sort_order' => 6,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::create($data);
        }

        $this->command->info('✅ '.count($posts).' articles de blog insérés.');
    }
}
