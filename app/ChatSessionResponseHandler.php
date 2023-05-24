<?php

namespace App;

class ChatSessionResponseHandler
{

    public static function defaultResponse()
    {
        $response = <<<EOT
        Ipsum eiusmod quis laboris laborum ea reprehenderit nulla dolor sunt. Ea ea et ullamco duis ipsum officia anim.
        Proident minim reprehenderit qui excepteur ea. Nisi nisi anim voluptate anim amet do.
        \n1 - *UNDERGROUND*

        \n2 - *REVELATION RAP DE L'ANNÉE*

        \n3 - *MEILLEUR SINGLE RAP*

        \n4 - *MEILLEURE COLLABORATION RAP & VARIÉTÉ*

        \n5 - *MEILLEUR PERFORMANCE RAP FEMININE*

        \n6 - *MEILLEUR ARRANGEUR RAP*

        \n7 - *MEILLEUR SLAMEUR*

        \n8 - *MEILLEUR GROUPE RAP DE L'ANNÉE*

        \n9 - *MEILLEUR RAPPEUR DE L'ANNÉE*

        \n10 - *MEILLEURE STRUCTURE DE PRODUCTION*

        \n11 - *MEILLEUR ALBUM RAP DE L'ANNÉE*

        \n12 - *MEILLEUR CLIP VIDEO RAP*

        \n13 - *MEILLEUR BLOG*

        \n14 - *MEILLEUR RAPPEUR DE LA DIASPORA*

        \n15 - *MEILLEURE ÉMISSION RAP RADIO*

        \n16 - *MEILLEUR RAPPEUR DE LA SOUS RÉGION*

        \n17 - *MEILLEUR RAP&CO*

        \n\n Choisissez la catégorie
        EOT;

        return $response;
    }

    public static function levelResponse($level) {

        $reponse = "";

        switch ($level) {
            #UNDERGROUND
            case 1:
                $reponse = <<<EOT
                *UNDERGROUND* \n
                Choisissez votre artiste
                \n\n 1 - Leno
                  \n 2 - Bibega
                  \n 3 - FatBoy
                  \n 4 - Kiosga
                  \n 5 - Drill du Faso
                  \n 6 - Pandra
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #REVELATION RAP DE L'ANNÉE
            case 2:
                $reponse = <<<EOT
                *REVELATION RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1 - HMine
                  \n 2 - Flowman boy
                  \n 3 - Blacky la machette
                  \n 4 - Francky FP
                  \n 5 - Krystifay
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR SINGLE RAP
            case 3:
                $reponse = <<<EOT
                *MEILLEUR SINGLE RAP* \n
                Choisissez votre artiste
                \n\n 1 - Blacky Kalash-Faso koura
                  \n 2 - Iba J-Rihana
                  \n 3 - Collectif sya voice-Barika kodo
                  \n 4 - Nindia-DAMA DAMA
                  \n 5 - Kayawoto-Ouaga riimin
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE COLLABORATION RAP & VARIÉTÉ
            case 4:
                $reponse = <<<EOT
                *MEILLEURE COLLABORATION RAP & VARIÉTÉ* \n
                Choisissez votre artiste
                \n\n 1 - Amzy ft Nabalum-Amour compliqué
                  \n 2 - Smarty ft Alif naaba-Kiiba
                  \n 3 - Smarty ft Manwdoe-Djakobi
                  \n 4 - Faity baby ft Tanya-Warga
                  \n 5 - Duden J ft Alif naaba-Le noir en couleur
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR PERFORMANCE RAP FEMININE
            case 5:
                $reponse = <<<EOT
                *MEILLEUR PERFORMANCE RAP FEMININE* \n
                Choisissez votre artiste
                \n\n 1 - Rin'ka
                  \n 2 - Quenzy
                  \n 3 - Imelda Amazone
                  \n 4 - Lady sky
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR ARRANGEUR RAP
            case 6:
                $reponse = <<<EOT
                *MEILLEUR ARRANGEUR RAP* \n
                Choisissez votre artiste
                \n\n 1 - Demda
                  \n 2 - Mr Wends
                  \n 3 - Petit Bouba
                  \n 4 - Frere Malkhom
                  \n 5 - Leo
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR SLAMEUR
            case 7:
                $reponse = <<<EOT
                *MEILLEUR SLAMEUR* \n
                Choisissez votre artiste
                \n\n 1 - Dr Abdallah
                  \n 2 - Blaazy
                  \n 3 - Whe WE
                  \n 4 - Dala le Slameur
                  \n 5 - Afrikan'Da
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR GROUPE RAP DE L'ANNÉE
            case 8:
                $reponse = <<<EOT
                *MEILLEUR GROUPE RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1 - Voie rouge
                  \n 2 - Mercanty
                  \n 3 - 2BK
                  \n 4 - Faso Gang
                  \n 5 - BMC 44
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAPPEUR DE L'ANNÉE
            case 9:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1 - Iba J
                  \n 2 - Smarty
                  \n 3 - Kayawoto
                  \n 4 - Duden J
                  \n 5 - Joey le soldat
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE STRUCTURE DE PRODUCTION
            case 10:
                $reponse = <<<EOT
                *MEILLEURE STRUCTURE DE PRODUCTION* \n
                Choisissez votre artiste
                \n\n 1 - Wakanda prod
                  \n 2 - Oza prod
                  \n 3 - l'Industrie
                  \n 4 - Propulsion prod
                  \n 5 - Destiny prod
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR ALBUM RAP DE L'ANNÉE
            case 11:
                $reponse = <<<EOT
                *MEILLEUR ALBUM RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1 - Smarty-odyssée
                  \n 2 - Barack la voix d'or-Barika
                  \n 3 - Huguo boss-M'Business 2.0
                  \n 4 - Faity baby-Performance
                  \n 5 - Duden J-Le retour du brave
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR CLIP VIDEO RAP
            case 12:
                $reponse = <<<EOT
                *MEILLEUR CLIP VIDEO RAP* \n
                Choisissez votre artiste
                \n\n 1 - HMine-Est ce que c'est compliqué
                  \n 2 - Collectif sya voice- BARIKA KODO
                  \n 3 - Francky FP-yelfo
                  \n 4 - Kayawoto-ouaga riimin
                  \n 5 - Smarty-Tout le monde et personne (TLMP)
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR BLOG
            case 13:
                $reponse = <<<EOT
                *MEILLEUR BLOG* \n
                Choisissez votre artiste
                \n\n 1 - Faso rap
                  \n 2 - Rap 226 actu
                  \n 3 - Fzso rap punch
                  \n 4 - Rap info
                  \n 5 - Rap Faso
                \n\n 0 - Retour a l'accueil
                EOT;
                break;


            #MEILLEUR RAPPEUR DE LA DIASPORA
            case 14:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE LA DIASPORA* \n
                Choisissez votre artiste
                \n\n 1 - Ish Sankara
                  \n 2 - Djabty Jah
                  \n 3 - Kabrino
                  \n 4 - FlexyHTown
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE ÉMISSION RAP RADIO
            case 15:
                $reponse = <<<EOT
                *MEILLEURE ÉMISSION RAP RADIO* \n
                Choisissez votre artiste
                \n\n 1 - Tendance slam-Bony lanky
                  \n 2 - Survoltage-Aziz izi
                  \n 3 - HipHop forever-Cpt Debgara
                  \n 4 - Zone H-Christan H
                  \n 5 - Old school-Claude B
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAPPEUR DE LA SOUS RÉGION
            case 16:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE LA SOUS RÉGION* \n
                Choisissez votre artiste
                \n\n 1 - Barakina
                  \n 2 - Iba One
                  \n 3 - Didi B
                  \n 4 - LeBaron
                  \n 5 - Suspect 95
                \n\n 0 - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAP&CO
            case 17:
                $reponse = <<<EOT
                *MEILLEUR RAP&CO* \n
                Choisissez votre artiste
                \n\n 1 - Les Séparables-Ouaga Lome
                  \n 2 - Frere Malkhom AMZY KEREKEKAMKUKA et Dabross- laissons passer nos enfants
                  \n 3 - Noaga-Gander
                  \n 4 - Les séparables ft askoy
                  \n 5 - El Presidenté feat Dabross-Damso
                \n\n 0 - Retour a l'accueil
                EOT;
                break;


            default:
            $reponse = <<<EOT
            *ERREUR DE CHOIX ENVOYEZ VOTE POUR REPRENDRE*
            EOT;
                break;
        }

        return $reponse;

    }

    public static function level1Response($language)
    {
        $lang1 = <<<EOT
        Select a Service Bot*
        \n\n1. Computers\n2. Development\n*. Back
        EOT;


        $lang2 = <<<EOT
        Sankhani ntchito*
        \n\n1. Za ma kompyuta\n2. Zo Koda\n* Bwelerani
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level2_1Response($language)
    {
        $lang1 = <<<EOT
        Select a Computer Service *
        \n\n1. Networks\n2. Repairs\n3. Accessories\n*. Back
        EOT;


        $lang2 = <<<EOT
        Sankhani ntchito ya kompyuta*
        \n\n1. Za ma netiweki\n2. Zokonza konza\n3. Zida za kompyuta\n* Bwelerani
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level2_2Response($language)
    {
        $lang1 = <<<EOT
        Select a Development Service *
        \n\n1. Web\n2. Desktop\n3. Mobile\n*. Back
        EOT;


        $lang2 = <<<EOT
        Sankhani ntchito ya zo koda*
        \n\n1. Webusayiti\n2. Kompyuta\n3. mafoni\n* Bwelerani
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level3_1_1Response($language)
    {
        $lang1 = <<<EOT
        We can configure your network needs for as low as ```MWK 200,000```\n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Timaika netiwiki pa malo ano pa mtengo otchipa zedi kufikila pa ```MWK 200,000```\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }


    public static function level3_1_2Response($language)
    {
        $lang1 = <<<EOT
        We perform all sorts of repairs for as low as ```MWK 10,000```\n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Timakonza  zida zosiyana siya pa mtengo wozizila monga ```MWK 10,000```\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level3_1_3Response($language)
    {
        $lang1 = <<<EOT
        We have the following Computer accessories for you:
        \n\n. Mouse Pads -  *K 3,000*
        \n. Cooling Pads - *K 12,500*
        \n. Stickers - *K 3,000*
        \n. Dongle - *K 30,000*
        \n. Mouse - *K 4,500*
        \n. Keyboard - *K 7,000*\n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Tili ndi zida za kompyuta zoyisana siya monga:
        \n\n. Mouse Pads -  *K 3,000*
        \n. Cooling Pads - *K 12,500*
        \n. Stickers - *K 3,000*
        \n. Dongle - *K 30,000*
        \n. Mouse - *K 4,500*
        \n. Keyboard - *K 7,000*\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level3_2_1Response($language)
    {
        $lang1 = <<<EOT
        We develop custom websites and web applications for as low as ```MWK 200,000```\n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Timakoda ma webusayiti pa mtengo wozizila monga ```MWK 200,000```\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level3_2_2Response($language)
    {
        $lang1 = <<<EOT
        We are experts in efficient desktop applications. Our charges range from  ```MWK 200,000``` -  ```MWK 6,000,000```.\n\n*Price may be more depending on requirements.
        \n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Timakoda ma ma sisitimu a mphamvu a pa kompyuta,mitengo yathu imayambira ```MWK 200,000```\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }

    public static function level3_2_3Response($language)
    {
        $lang1 = <<<EOT
        We are experts in mobile development. Our charges range from  ```MWK 200,000``` -  ```MWK 6,000,000```.
        \n\n*Price may be more depending on requirements.*\n\n
        # Restart\n
        \n\nThank you!
        EOT;


        $lang2 = <<<EOT
        Ndife ma dolo popanga ma sisitumu apa lamya, mitengo yathu imayambila ```MWK 200,000```\n\n
        # Yambilaninso\n\nZikomo Kwambiri
        EOT;

        // return the response based on language
        return $language == 1 ? $lang1 : $lang2;
    }
}
