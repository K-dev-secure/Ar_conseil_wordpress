<?php
/**
 * template name: Services
 */

get_header(); ?>

<style>
.background_header_services {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( get_the_post_thumbnail_url());
    ?>);
}
</style>

<div class="background_header_services">
    <h1> Nos services</h1>
    <h2>Conseil patrimonial et accompagnement immobilier à Lyon</h2>
</div>

<div class="second_section_services">
    <h2>Des services sur mesure pour sécuriser et développer votre patrimoine</h2>
    <p>Basé à Lyon, AR Conseils accompagne particuliers, propriétaires et investisseurs dans leurs projets patrimoniaux
        et immobiliers. Notre approche repose sur une expertise terrain, une analyse précise de votre situation et un
        accompagnement personnalisé à chaque étape : stratégie, décisions et suivi.</p>
    <p>Que vous souhaitiez optimiser votre patrimoine immobilier, préparer un investissement locatif, structurer vos
        démarches ou gagner en visibilité sur vos choix, nous proposons des solutions claires, fiables et adaptées à vos
        objectifs. Notre priorité : vous offrir un conseil transparent, réactif et orienté résultats.</p>



    <div class="services_list" id="services_1">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/1.png' ) ); ?>" alt="">
        <h3>Private Equity</h3>
        <p> Le Private Equity consiste à investir dans le capital de sociétés non cotées en bourse. Plutôt que de miser
            sur la volatilité des marchés financiers classiques, vous soutenez directement la croissance d'entreprises
            réelles (PME, startups ou entreprises en développement). C’est un levier puissant pour diversifier votre
            patrimoine tout en participant à l'économie réelle. Chez AR Conseils, nous sélectionnons des fonds de
            capital-investissement rigoureux qui offrent des perspectives de rendement supérieures sur le long terme, en
            contrepartie d'une période de blocage des fonds. C'est la solution idéale pour les investisseurs avertis
            cherchant à décorréler leurs actifs des fluctuations boursières quotidiennes.</p>
    </div>


    <div class="services_list" id="services_2">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/beautiful-architecture-office-business-building-with-glass-window-shape-1.png' ) ); ?>"
            alt="">
        <h3>PGFI</h3>
        <p> Investir dans un GFI, c’est devenir copropriétaire de parcelles de forêts françaises. Au-delà de l’aspect
            écologique et durable, c’est un actif "refuge" déconnecté des marchés financiers. Le rendement provient de
            la coupe et de la vente du bois, ainsi que de la valorisation du foncier forestier au fil du temps. C’est un
            outil d'exception pour la transmission de patrimoine, car il bénéficie d'un cadre fiscal très avantageux
            (abattement sur les droits de succession). AR Conseils vous accompagne dans le choix de groupements gérés
            durablement, alliant protection de la biodiversité et stabilité patrimoniale pour les générations futures.
        </p>
    </div>


    <div class="services_list" id="services_3">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/3.png' ) ); ?>" alt="">
        <h3>SCPI</h3>
        <p> Souvent appelée "pierre-papier", la SCPI vous permet d'investir dans l'immobilier professionnel (bureaux,
            devenez propriétaire d'une fraction d'un parc immobilier locatif et percevez des revenus réguliers
            (dividendes) correspondant aux loyers collectés. C'est une solution de choix pour générer des revenus
            complémentaires avec un ticket d'entrée accessible. Air Conseil analyse pour vous le marché afin de
            sélectionner les SCPI les plus résilientes, offrant le meilleur équilibre entre taux de distribution et
            qualité du parc immobilier.</p>
    </div>




    <div class="services_list" id="services_4">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/4.png' ) ); ?>" alt="">
        <h3>Immobilier</h3>
        <p> L'investissement immobilier reste le pilier préféré des Français pour bâtir un patrimoine solide et pérenne.
            Qu'il s'agisse de préparer votre retraite, de protéger votre famille ou de réduire vos impôts (via des
            dispositifs comme la loi Pinel, le LMNP ou le Malraux), l'immobilier direct permet d'utiliser l'effet de
            levier du crédit bancaire. Air Conseil vous guide à chaque étape : de la stratégie d'acquisition à la
            sélection du dispositif fiscal le plus adapté à votre situation. Nous transformons la pierre en un outil
            financier optimisé, en veillant à l'emplacement géographique et à la qualité intrinsèque du bien pour
            garantir sa valorisation future..</p>
    </div>



    <div class="services_list" id="services_5">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/5.png' ) ); ?>" alt="">
        <h3>Assurance vie</h3>
        <p>L’assurance-vie est souvent qualifiée de "couteau suisse" du patrimoine. C’est un contrat de placement
            flexible qui permet de valoriser un capital tout en bénéficiant d’une fiscalité avantageuse sur les gains
            après huit ans. Elle offre une liberté totale : vous pouvez investir sur des fonds sécurisés (fonds euros)
            ou sur des supports plus dynamiques (unités de compte). Chez Air Conseil, nous concevons des allocations
            sur-mesure au sein de votre contrat pour répondre à vos objectifs, qu'il s'agisse d'épargne disponible, de
            valorisation de capital ou de transmission optimisée à vos bénéficiaires grâce à un cadre successoral hors
            pair.</p>
    </div>


    <div class="services_list" id="services_6">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/6.png' ) ); ?>" alt="">
        <h3>Contrat de capitalisation</h3>
        <p>Proche de l'assurance-vie dans son fonctionnement, le contrat de capitalisation s'en distingue par sa
            dimension patrimoniale spécifique. Il ne repose pas sur une clause bénéficiaire en cas de décès, mais fait
            partie intégrante de votre succession. Son grand avantage réside dans la possibilité de le transmettre par
            donation de son vivant tout en conservant l'antériorité fiscale du contrat. C’est un outil puissant pour les
            personnes morales (sociétés) ou les particuliers souhaitant optimiser leur stratégie de transmission. Air
            Conseil vous aide à intégrer ce contrat dans une vision globale pour protéger et transmettre votre capital
            avec une efficacité fiscale maximale.</p>
    </div>



    <div class="services_list" id="services_7">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/7.png' ) ); ?>" alt="">
        <h3>Prévoyance </h3>
        <p> La prévoyance est le bouclier de votre patrimoine. Son rôle est de vous protéger, vous et vos proches, face
            aux aléas de la vie : accident, maladie, invalidité ou décès. Contrairement à la mutuelle qui rembourse les
            soins, la prévoyance garantit le maintien de votre niveau de vie par le versement d'indemnités journalières
            ou d'un capital. Pour un dirigeant ou un indépendant, c’est une protection indispensable. Air Conseil
            réalise un audit de vos garanties actuelles et vous propose des solutions adaptées pour combler les failles
            de votre protection sociale, afin que votre projet de vie ne soit jamais mis en péril par un imprévu de
            santé.</p>
    </div>

    <div class="services_list" id="services_8">
        <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/03/8.png' ) ); ?>" alt="">
        <h3>Compte Titre & PEA</h3>
        <p> Le Compte-Titres et le PEA sont les portes d'entrée privilégiées vers les marchés financiers mondiaux. Le
            PEA est un outil de capitalisation à la fiscalité très attractive, dédié aux actions européennes, idéal pour
            construire une épargne de long terme. Le Compte-Titres, plus flexible, permet d'investir sans plafond sur
            tous types de valeurs (actions internationales, obligations, ETF). Air Conseil vous apporte son expertise en
            gestion d'actifs pour définir une stratégie d'investissement cohérente avec votre profil de risque, en
            naviguant entre opportunités de croissance et gestion de la volatilité pour faire fructifier votre capital.
        </p>
    </div>




    <div class="gutenberg-content">
        <?php
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
            the_content(); 
        endwhile; 
    endif; 
    ?>
    </div>
</div>

<?php  get_footer(); ?>