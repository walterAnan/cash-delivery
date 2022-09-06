<?php


use App\Enums\StatutDemandeEnum;

const DEFAULT_PASSWORD = 'password';
const DEFAULT_TEAM_ID = 1;

/**
 * Les statuts possibles pour une demande de livraison
 */
const DEMANDE_INITIEE    = 1;
const DEMANDE_ASSIGNEE = 2;
const DEMANDE_ENCOURS    = 3;
const DEMANDE_EFFECTUEE  = 4;
const DEMANDE_ANNULEE    = 5;



/**
 * Type de livreur
 */


const INTERNE = 1;
const EXTERNE = 2;



/**
 * Statuts d'un appareil
 */

const ACTIF = 1;
const INACTIF = 2;

function badgeColor(int $statutDemande)
{
    return match ($statutDemande) {
        DEMANDE_INITIEE => 'badge-primary',
        DEMANDE_ASSIGNEE => 'badge-secondary',
        DEMANDE_ENCOURS => 'badge-warning',
        DEMANDE_EFFECTUEE => 'badge-success',
        DEMANDE_ANNULEE => 'badge-danger',

    };
}

function send_notification_FCM($notification_id, $title, $message, $id,$type) {

    $accesstoken = env('FCM_KEY');

    $URL = 'https://fcm.googleapis.com/fcm/send';


    $post_data = '{
            "to" : "' . $notification_id . '",
            "data" : {
              "body" : "",
              "title" : "' . $title . '",
              "type" : "' . $type . '",
              "id" : "' . $id . '",
              "message" : "' . $message . '",
            },
            "notification" : {
                 "body" : "' . $message . '",
                 "title" : "' . $title . '",
                  "type" : "' . $type . '",
                 "id" : "' . $id . '",
                 "message" : "' . $message . '",
                "icon" : "new",
                "sound" : "default"
                },

          }';
    // print_r($post_data);die;

    $crl = curl_init();

    $headr = array();
    $headr[] = 'Content-type: application/json';
    $headr[] = 'Authorization: ' . $accesstoken;
    curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($crl, CURLOPT_URL, $URL);
    curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

    $rest = curl_exec($crl);

    if ($rest === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        //print_r('Curl error: ' . curl_error($crl));
        $result_noti = 0;
    } else {

        $result_noti = 1;
    }

    //curl_close($crl);
    //print_r($result_noti);die;
    return $result_noti;
}
