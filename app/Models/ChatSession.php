<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ChatSessionResponseHandler;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Uuid;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\paiements;

class ChatSession extends Model
{

    protected $fillable = ['phone', 'language', 'level', 'prev_response'];



    public static function getRecord($phone)
    {
        $chatSession = self::where(['phone' => $phone])->first();

        if (!$chatSession) {
            $chatSession = self::create([
                'phone' => $phone,
                'level' => 0
            ]);
        }

        return $chatSession;
    }

    public function getMessage($user_input)
    {

        $valeurChoix = [
            1 => 6, // UNDERGROUND
            2 => 5, // REVELATION RAP DE L'ANNÉE
            3 => 5, // MEILLEUR SINGLE RAP
            4 => 5, // MEILLEURE COLLABORATION RAP & VARIÉTÉ
            5 => 4, // MEILLEUR PERFORMANCE RAP FEMININE
            6 => 5, // MEILLEUR ARRANGEUR RAP
            7 => 5, // MEILLEUR SLAMEUR
            8 => 5, // MEILLEUR GROUPE RAP DE L'ANNÉE
            9 => 5, // MEILLEUR RAPPEUR DE L'ANNÉE
            10 => 5, // MEILLEURE STRUCTURE DE PRODUCTION
            11 => 5, // MEILLEUR ALBUM RAP DE L'ANNÉE
            12 => 5, // MEILLEUR CLIP VIDEO RAP
            13 => 5, // MEILLEUR BLOG
            14 => 4, // MEILLEUR RAPPEUR DE LA DIASPORA
            15 => 5, // MEILLEURE ÉMISSION RAP RADIO
            16 => 5, // MEILLEUR RAPPEUR DE LA SOUS RÉGION
            17 => 5, // MEILLEUR RAP&CO
        ];


        if ($user_input == "vote" || $user_input == "*") {
           $this->update(['level' => 0,  'prev_response' => null]);
           return $this->defaultResponse();
        } else if (is_numeric($user_input)) {
            if (
                ((int) $this->level) == 0 &&
                is_numeric($user_input) &&
                (((int) $user_input) >= 1 && ((int) $user_input) <= 17) ) {

                $this->update(['level' => $user_input, 'prev_response' => $this->level]);
                return $this->levelResponse((int) $user_input);
            } elseif (is_numeric($user_input) &&
                (((int) $this->level) >= 1 &&
                 ((int) $this->level) <= 17) &&
                ((int) $this->prev_response == 0)) {

                    if (((int) $user_input) == 0) {
                        $this->update(['level' => 0, 'prev_response' => null]);
                        return $this->levelResponse((int) $user_input);
                    } elseif (((int) $user_input) > 0 &&
                                $valeurChoix[$this->level] >= ((int) $user_input)) {

                    // Initialisation du paiement
                    // $reference    = (string) $this->generateReference();
                    // $id_votant    = (string) $this->id;
                    // $nb_categorie = (string) $this->prev_response;
                    // $nb_artiste   = (string) $user_input;

                    // $init_transaction = paiements::initialisation($reference, $id_votant, $nb_categorie, $nb_artiste);

                    // dd($init_transaction);

                        // $response = Http::get('http://example.com');

                        $message ="Lien de confirmation de la vote : http://dev.afreekaplay.com/".$user_input."/".$this->prev_response;

                        $message = $message.
                                    <<<EOT

                                    Envoi *"VOTE"* pour revenir au menu principal
                                    EOT;

                        return $message;
                    } else {
                        return $this->levelResponse(20);
                    }



                // $this->update(['level' => $user_input, 'prev_response' => $this->level]);
                // return $this->levelResponse((int) $user_input);
                // return " level : ".$this->level."; prev_response: ".$this->prev_response;
            } else {
                $this->update(['level' => 0, 'prev_response' => null]);
                return $this->levelResponse(0);
            }

        } else {
            $this->update(['level' => 0, 'prev_response' => null]);
            return $this->levelResponse(null);
         }





        //  if ($this->level >= 1 && $this->level <= 17) {
        //     # code...
        //  }

        //  if ($user_input) {
        //     $this->update(['level' => $user_input, 'prev_response' => $this->level]);
        //     return ChatSessionResponseHandler::levelResponse($user_input);
        //  }

    }

    public function defaultResponse()
    {
        $response = <<<EOT
        Ipsum eiusmod quis laboris laborum ea reprehenderit nulla dolor sunt. Ea ea et ullamco duis ipsum officia anim.
        Proident minim reprehenderit qui excepteur ea. Nisi nisi anim voluptate anim amet do.

        1️⃣ - *UNDERGROUND*

        2️⃣ - *REVELATION RAP DE L'ANNÉE*

        3️⃣ - *MEILLEUR SINGLE RAP*

        4️⃣ - *MEILLEURE COLLABORATION RAP & VARIÉTÉ*

        5️⃣ - *MEILLEUR PERFORMANCE RAP FEMININE*

        6️⃣ - *MEILLEUR ARRANGEUR RAP*

        7️⃣ - *MEILLEUR SLAMEUR*

        8️⃣ - *MEILLEUR GROUPE RAP DE L'ANNÉE*

        9️⃣ - *MEILLEUR RAPPEUR DE L'ANNÉE*

        1️⃣0️⃣ - *MEILLEURE STRUCTURE DE PRODUCTION*

        1️⃣1️⃣ - *MEILLEUR ALBUM RAP DE L'ANNÉE*

        1️⃣2️⃣ - *MEILLEUR CLIP VIDEO RAP*

        1️⃣3️⃣ - *MEILLEUR BLOG*

        1️⃣4️⃣ - *MEILLEUR RAPPEUR DE LA DIASPORA*

        1️⃣5️⃣ - *MEILLEURE ÉMISSION RAP RADIO*

        1️⃣6️⃣ - *MEILLEUR RAPPEUR DE LA SOUS RÉGION*

        1️⃣7️⃣ - *MEILLEUR RAP&CO*

        \n Choisissez la catégorie
        EOT;

        return $response;
    }

    public function generateReference() {
        $mytime = "VOTE-".Carbon::now()->format('dmYhms');
        // dd($mytime);
        return $mytime;
    }

    public function levelResponse($level) {

        $reponse = "";

        switch ($level) {
            #
            case 0:
                $reponse = $this->defaultResponse();
                break;
            #UNDERGROUND
            case 1:
                $reponse = <<<EOT
                *UNDERGROUND* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Leno
                  \n 2️⃣ - Bibega
                  \n 3️⃣ - FatBoy
                  \n 4️⃣ - Kiosga
                  \n 5️⃣ - Drill du Faso
                  \n 6️⃣ - Pandra
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #REVELATION RAP DE L'ANNÉE
            case 2:
                $reponse = <<<EOT
                *REVELATION RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1️⃣ - HMine
                  \n 2️⃣ - Flowman boy
                  \n 3️⃣ - Blacky la machette
                  \n 4️⃣ - Francky FP
                  \n 5️⃣ - Krystifay
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR SINGLE RAP
            case 3:
                $reponse = <<<EOT
                *MEILLEUR SINGLE RAP* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Blacky Kalash-Faso koura
                  \n 2️⃣ - Iba J-Rihana
                  \n 3️⃣ - Collectif sya voice-Barika kodo
                  \n 4️⃣ - Nindia-DAMA DAMA
                  \n 5️⃣ - Kayawoto-Ouaga riimin
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE COLLABORATION RAP & VARIÉTÉ
            case 4:
                $reponse = <<<EOT
                *MEILLEURE COLLABORATION RAP & VARIÉTÉ* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Amzy ft Nabalum-Amour compliqué
                  \n 2️⃣ - Smarty ft Alif naaba-Kiiba
                  \n 3️⃣ - Smarty ft Manwdoe-Djakobi
                  \n 4️⃣ - Faity baby ft Tanya-Warga
                  \n 5️⃣ - Duden J ft Alif naaba-Le noir en couleur
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR PERFORMANCE RAP FEMININE
            case 5:
                $reponse = <<<EOT
                *MEILLEUR PERFORMANCE RAP FEMININE* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Rin'ka
                  \n 2️⃣ - Quenzy
                  \n 3️⃣ - Imelda Amazone
                  \n 4️⃣ - Lady sky
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR ARRANGEUR RAP
            case 6:
                $reponse = <<<EOT
                *MEILLEUR ARRANGEUR RAP* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Demda
                  \n 2️⃣ - Mr Wends
                  \n 3️⃣ - Petit Bouba
                  \n 4️⃣ - Frere Malkhom
                  \n 5️⃣ - Leo
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR SLAMEUR
            case 7:
                $reponse = <<<EOT
                *MEILLEUR SLAMEUR* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Dr Abdallah
                  \n 2️⃣ - Blaazy
                  \n 3️⃣ - Whe WE
                  \n 4️⃣ - Dala le Slameur
                  \n 5️⃣ - Afrikan'Da
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR GROUPE RAP DE L'ANNÉE
            case 8:
                $reponse = <<<EOT
                *MEILLEUR GROUPE RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Voie rouge
                  \n 2️⃣ - Mercanty
                  \n 3️⃣ - 2BK
                  \n 4️⃣ - Faso Gang
                  \n 5️⃣ - BMC 44
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAPPEUR DE L'ANNÉE
            case 9:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Iba J
                  \n 2️⃣ - Smarty
                  \n 3️⃣ - Kayawoto
                  \n 4️⃣ - Duden J
                  \n 5️⃣ - Joey le soldat
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE STRUCTURE DE PRODUCTION
            case 10:
                $reponse = <<<EOT
                *MEILLEURE STRUCTURE DE PRODUCTION* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Wakanda prod
                  \n 2️⃣ - Oza prod
                  \n 3️⃣ - l'Industrie
                  \n 4️⃣ - Propulsion prod
                  \n 5️⃣ - Destiny prod
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR ALBUM RAP DE L'ANNÉE
            case 11:
                $reponse = <<<EOT
                *MEILLEUR ALBUM RAP DE L'ANNÉE* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Smarty-odyssée
                  \n 2️⃣ - Barack la voix d'or-Barika
                  \n 3️⃣ - Huguo boss-M'Business 2.0
                  \n 4️⃣ - Faity baby-Performance
                  \n 5️⃣ - Duden J-Le retour du brave
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR CLIP VIDEO RAP
            case 12:
                $reponse = <<<EOT
                *MEILLEUR CLIP VIDEO RAP* \n
                Choisissez votre artiste
                \n\n 1️⃣ - HMine-Est ce que c'est compliqué
                  \n 2️⃣ - Collectif sya voice- BARIKA KODO
                  \n 3️⃣ - Francky FP-yelfo
                  \n 4️⃣ - Kayawoto-ouaga riimin
                  \n 5️⃣ - Smarty-Tout le monde et personne (TLMP)
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR BLOG
            case 13:
                $reponse = <<<EOT
                *MEILLEUR BLOG* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Faso rap
                  \n 2️⃣ - Rap 226 actu
                  \n 3️⃣ - Fzso rap punch
                  \n 4️⃣ - Rap info
                  \n 5️⃣ - Rap Faso
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;


            #MEILLEUR RAPPEUR DE LA DIASPORA
            case 14:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE LA DIASPORA* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Ish Sankara
                  \n 2️⃣ - Djabty Jah
                  \n 3️⃣ - Kabrino
                  \n 4️⃣ - FlexyHTown
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEURE ÉMISSION RAP RADIO
            case 15:
                $reponse = <<<EOT
                *MEILLEURE ÉMISSION RAP RADIO* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Tendance slam-Bony lanky
                  \n 2️⃣ - Survoltage-Aziz izi
                  \n 3️⃣ - HipHop forever-Cpt Debgara
                  \n 4️⃣ - Zone H-Christan H
                  \n 5️⃣ - Old school-Claude B
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAPPEUR DE LA SOUS RÉGION
            case 16:
                $reponse = <<<EOT
                *MEILLEUR RAPPEUR DE LA SOUS RÉGION* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Barakina
                  \n 2️⃣ - Iba One
                  \n 3️⃣ - Didi B
                  \n 4️⃣ - LeBaron
                  \n 5️⃣ - Suspect 95️
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;

            #MEILLEUR RAP&CO
            case 17:
                $reponse = <<<EOT
                *MEILLEUR RAP&CO* \n
                Choisissez votre artiste
                \n\n 1️⃣ - Les Séparables-Ouaga Lome
                  \n 2️⃣ - Frere Malkhom AMZY KEREKEKAMKUKA et Dabross- laissons passer nos enfants
                  \n 3️⃣ - Noaga-Gander
                  \n 4️⃣ - Les séparables ft askoy
                  \n 5️⃣ - El Presidenté feat Dabross-Damso
                \n\n 0️⃣ - Retour a l'accueil
                EOT;
                break;


            default:
            $reponse = <<<EOT
            *ERREUR DE CHOIX ENVOYEZ "VOTE" POUR REPRENDRE*
            EOT;
            // $this->update(['level' => 0]);

            break;
        }

        return $reponse;

    }


    public function getMessage1($user_input)
    {
        $user_input = strtolower($user_input);


        // Handle First request in the session
        if ($this->level === 0) {
            $this->update(['level' => 1]);
            return ChatSessionResponseHandler::defaultResponse();
        }

        // Handle 2nd request in the session
        if ($this->level === 1) {
            if ($user_input != "1" && $user_input != "2") {
                return ChatSessionResponseHandler::defaultResponse();
            }

            $this->update(['language' => $user_input, 'level' => 2]);
            return ChatSessionResponseHandler::level1Response($this->language);
        }

        // handle 3rd request in session
        if ($this->level === 2) {
            if ($user_input == '*') {
                $this->update(['level' => 1]);
                return ChatSessionResponseHandler::level1Response($this->language);
            }

            if ($user_input !== "1" && $user_input != "2") {
                return ChatSessionResponseHandler::level1Response($this->language);
            }

            $this->update(['level' => 3, 'prev_response' => $user_input]);

            switch ($user_input) {
                case '1':
                    return ChatSessionResponseHandler::level2_1Response($this->language);
                case '2':
                    return ChatSessionResponseHandler::level2_2Response($this->language);
                default:
                    return 'Failed to send you a proper message!Try again later';
            }
        }

        if ($this->level === 3) {
            if ($user_input == '*') {
                $this->update(['level' => 2]);
                return ChatSessionResponseHandler::level1Response($this->language);
            }


            if (!in_array($user_input, ["1", "2", "3"])) {
                switch ($this->prev_response) {
                    case '1':
                        return ChatSessionResponseHandler::level2_1Response($this->language);
                    case '2':
                        return ChatSessionResponseHandler::level2_2Response($this->language);
                    default:
                        return 'Failed to send you a proper message.Try again later!';
                }
            }

            $this->update(['level' => 4]);


            if ($this->prev_response == '1') {
                switch ($user_input) {
                    case '1':
                        return ChatSessionResponseHandler::level3_1_1Response($this->language);
                    case '2':
                        return ChatSessionResponseHandler::level3_1_2Response($this->language);
                    case '3':
                        return ChatSessionResponseHandler::level3_1_3Response($this->language);
                }
            } elseif ($this->prev_response == '2') {
                switch ($user_input) {
                    case '1':
                        return ChatSessionResponseHandler::level3_2_1Response($this->language);
                    case '2':
                        return ChatSessionResponseHandler::level3_2_2Response($this->language);
                    case '3':
                        return ChatSessionResponseHandler::level3_2_3Response($this->language);
                }
            }

        }

        if ($this->level === 4) {
            if ($user_input == '#') {
                $this->update(['level' => 1, 'prev_response' => null]);
                return ChatSessionResponseHandler::defaultResponse();
            }

            if ($this->language == 1) {
                return "Please enter *#* to restart.";
            }

            return "Tsindikani *#* kuti muyambilenso.";

        }
    }

    public function getLevel1($level) {

    }

}

