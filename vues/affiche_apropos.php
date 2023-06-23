<?php
ob_start();
$titrePage = "Restaurant Quai Antique - A propos";


?>
<!-- J'ai repri la classe du titre pour certains h2 et h3 -->
    <div class="blocapropos">
        <h1 class="apropotextestyleh1">À propos du restaurant Le Quai Antique</h1>
        <p class="apropotextestyle">Le restaurant Le Quai Antique est un établissement familial situé sur les rives du lac du Bourget à Chambéry. Depuis 2005, nous vous proposons une cuisine traditionnelle française élaborée à partir de produits frais et de qualité.

            Notre mission est de vous offrir une expérience culinaire exceptionnelle dans un cadre chaleureux et convivial. Nous mettons tout en œuvre pour vous faire passer un agréable moment en famille, entre amis ou en amoureux.

            Notre équipe se compose de passionnés de la gastronomie française, de cuisiniers talentueux et de serveurs attentionnés, tous animés par la même passion : vous satisfaire.

            Nous sommes fiers de notre patrimoine culinaire français et nous travaillons avec des producteurs locaux pour vous offrir des plats frais et savoureux.

            Nous sommes heureux de vous accueillir dans notre restaurant et nous espérons que vous apprécierez votre expérience culinaire chez nous.</p>

          <div class="mentionslegalesstyle">
            <h2 class="mentionslegaletitlesstyle">Mentions légales</h2>

        <p>Le Quai Antique SAS<br>
Adresse : 12 rue des Bains fictifs, 73000 Chambéry<br>
Email : Lequaiantique@fictifsite.fr<br>
Telephone : 00 00 00 00 00</p>


        <p class="mentionslegalesstyle">Numéro de SIRET : XXX XXX XXX XXXXX</p>
        <p class="mentionslegalesstyle">Directeur de la publication : Jean Dupont</p>

        <h2 class="apropotextestyleh1">Conditions générales d'utilisation</h2>
        <p>En utilisant notre site web, vous acceptez nos conditions générales d'utilisation qui stipulent que vous vous engagez à respecter les lois et réglementations en vigueur, à ne pas perturber le fonctionnement du site, à ne pas utiliser le site pour des activités illégales, à ne pas violer les droits de propriété intellectuelle et à ne pas collecter des données sur les utilisateurs sans leur consentement.</p>
</div>

        <h2 class="apropotextestyleh1">Politique de confidentialité</h2>


        <p class="politiquedeconfidentialitestyle">Le Quai Antique SAS respecte la vie privée de ses utilisateurs et s'engage à protéger les informations personnelles qu'ils peuvent fournir lors de l'utilisation de notre site web.

            Les informations personnelles que nous collectons peuvent inclure votre nom, votre adresse e-mail, votre numéro de téléphone et toute autre information que vous choisissez de nous fournir. Nous collectons ces informations afin de vous fournir des services personnalisés et de vous contacter au sujet de votre utilisation de notre site web.

            Nous ne vendrons ni ne louerons jamais vos informations personnelles à des tiers. Nous ne partagerons vos informations personnelles qu'avec des tiers dans les cas suivants :

            Si vous avez donné votre consentement explicite à cette fin ;
            Si nous sommes tenus de le faire par la loi ou par une ordonnance judiciaire ;
            Si cela est nécessaire pour protéger les intérêts légitimes de notre entreprise, tels que la prévention de la fraude ou la protection de notre propriété intellectuelle.
            Nous utilisons des cookies sur notre site web pour améliorer votre expérience de navigation. Les cookies sont de petits fichiers texte stockés sur votre ordinateur ou votre appareil mobile lorsque vous visitez un site web. Nous utilisons des cookies pour nous aider à reconnaître votre navigateur et à vous fournir des informations personnalisées sur notre site web.

            En utilisant notre site web, vous consentez à notre utilisation de cookies conformément à notre politique de cookies. Vous pouvez modifier les paramètres de votre navigateur pour désactiver les cookies, mais cela peut affecter votre expérience de navigation sur notre site web.

            Si vous avez des questions ou des préoccupations concernant notre politique de confidentialité, n'hésitez pas à nous contacter. Nous nous engageons à protéger votre vie privée et à répondre à toutes vos demandes dans les meilleurs délais.</p>
        <h3  class="apropotextestyleh1">Notre politique d'utilisation des cookies</h3>
        <p class="mentionslegalescookiesstyle">Notre site web utilise des cookies pour améliorer votre expérience de navigation. Un cookie est un petit fichier texte stocké sur votre ordinateur ou votre appareil mobile lorsque vous visitez un site web. Nous utilisons un cookie d'identification pour faciliter le processus de réservation. Ce cookie nous permet de retenir les informations de réservation que vous avez saisies afin que vous n'ayez pas à les saisir à chaque fois que vous visitez notre site. Nous utilisons également des cookies de mesure d'audience pour collecter des informations sur la façon dont vous utilisez notre site web, telles que les pages que vous consultez et les liens sur lesquels vous cliquez. Ces informations nous aident à améliorer notre site et à le rendre plus convivial. En continuant à utiliser notre site web, vous acceptez l'utilisation de cookies conformément à notre politique de cookies. Si vous ne souhaitez pas que des cookies soient utilisés, vous pouvez modifier les paramètres de votre navigateur pour les désactiver. Veuillez noter que cela peut affecter votre expérience de navigation sur notre site web.</p>

    </div>


<?php

$contenu =ob_get_clean();

require_once 'layout.php';

