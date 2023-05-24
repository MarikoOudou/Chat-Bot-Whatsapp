<?php

namespace App\Http\Controllers;

use App\TemplateHandler;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;

use App\Models\ChatSession;

class BotController extends Controller
{
    protected function sendResponse($to, $message)
    {
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        return $twilio->messages->create($to, [
            'from' => "whatsapp:+14155238886",
            'body' => $message
        ]);
    }


    protected function getResponseTemplate($body): string
    {
        $body = strtolower($body);


        // register accepted interaction codes;

        switch ($body) {
            case 'computers':
                return TemplateHandler::computersResponse();
            case 'development':
                return TemplateHandler::devResponse();
            case 'networks':
                return TemplateHandler::networks();
            case 'repairs':
                return TemplateHandler::repairs();
            case 'accessories':
                return TemplateHandler::accessories();
            case 'web':
                return TemplateHandler::web();
            case 'desktop':
                return TemplateHandler::desktop();
            case 'mobile':
                return TemplateHandler::mobile();
            case 'embedded':
                return TemplateHandler::embedded();
        }

        return TemplateHandler::basic();
    }

    public function tester() {
        $info_whatsapp_business = [
            "verify_token"                      => config('services.whatsapp_business.verify_token'),
            "access_token"                      =>config('services.whatsapp_business.access_token'),
            "api_version"                       => config('services.whatsapp_business.api_version'),
            "phone_number_id_whatsapp_business" => config('services.whatsapp_business.phone_number_id_whatsapp_business'),
        ];

        // dd($info_whatsapp_business);
        return $info_whatsapp_business;
    }


    /*
     * Provides simple interactive messages to a whatsapp client
     */
    public function interact(Request $request)
    {
        $phone = $request->input('From');
        $profile = $request->input('ProfileName');
        $body = $request->input('Body');


        $template = $this->getResponseTemplate($body);
        $message = sprintf($template, $profile);

        return $this->sendResponse($phone, $message);
    }


    public function handleChat(Request $request)
    {
        $phone = $request->input('From');
        $profile = $request->input('ProfileName');
        $body = $request->input('Body');


        $chatSession = ChatSession::getRecord($phone);

        // dd($chatSession);

        $message = $chatSession->getMessage($body);
        return $this->sendResponse($phone, $message);
    }

    public function verifyToken(Request $request) {
        $mode = $request->input("hub_mode");
        $token = $request->input("hub_verify_token");
        $challenge = $request->input("hub_challenge");

        if ($mode && $token) {
            if ($mode == "subscribe" && $token == config('services.whatsapp_business.verify_token')) {
                return $challenge;
            }else {
                return "Erreur";
            }
        }
    }

    public function sendMessageTe(Request $request) {

        // return $request->input('entry')[0]["changes"][0]["value"]["messages"][0]["from"];

        $receptionData = [
            "phone_number_id" => $request->input('entry')[0]["changes"][0]["value"]["metadata"]["phone_number_id"],
            "from" => $request->input('entry')[0]["changes"][0]["value"]["messages"][0]["from"],
            "body" => $request->input('entry')[0]["changes"][0]["value"]["messages"][0]["text"]["body"],
            "other_number" => $request->input('entry')[0]["changes"][0]["value"]["contacts"][0]["wa_id"]
        ];
        $chatSession = ChatSession::getRecord($receptionData["phone_number_id"]);

        // return $data_to_send;
        $info_whatsapp_business = [
            "verify_token"                      => config('services.whatsapp_business.verify_token'),
            "access_token"                      => config('services.whatsapp_business.access_token'),
            "api_version"                       => config('services.whatsapp_business.api_version'),
            "phone_number_id_whatsapp_business" => config('services.whatsapp_business.phone_number_id_whatsapp_business'),
        ];
        $headers = [ "Content-Type" => "application/json"];
        $token = "EAADzrBMFAk4BAPI6wdA6WaSJLNyIyRoZAt5FX4I6scA91rf448PDhfvUozh1ai53Njva10tc4rgiU9lTQJtvdX6ru574y7h5sCOyU4hDB0qZBypdc3NjIAMJEiyDZCYRBAPRiHusAjp1OKC0KNx9egy6haozEkUE3d2SYsgNZBHqzbm7ic2m2sB0pSA7t8Hb5ysEBvO20upBGrnRCysl";

        $data_to_send = [
            "messaging_product" => "whatsapp",
            "to" => "2250757351113",
            "text" => [
                "body" => "Hello World, ".$receptionData["body"]
            ],
        ];


        $response = Http::
        // withToken($token)->
        withHeaders($headers)->
        // withBody($data_to_send, 'application/json')->
        post('https://graph.facebook.com/'.
        $info_whatsapp_business["api_version"]."/".
        $info_whatsapp_business["phone_number_id_whatsapp_business"].'/messages?access_token='.
        $token, $data_to_send);

    }


}
