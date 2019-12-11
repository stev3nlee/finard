<?php

namespace App\Helper;

use App\Helper\HelperFunction;
use GuzzleHttp\Client;
use Status;

class Mailchimp
{
    private $secret_key;
    private $base_url;

    public function __construct()
    {
        $this->secret_key = env('MAILCHIMP_API_KEY');
        $this->base_url = env('MAILCHIMP_BASE_URL');
        $this->audience_id = env('MAILCHIMP_AUDIENCE_ID');
        $this->credentials = 'anything:' . $this->secret_key;
        $this->helperFunction = new HelperFunction();
        $this->status = new Status();
        $this->Guzzle = new Client();
    }

    public function getLists()
    {
        try {
            $request = curl_init();
            $headers = array(
                "Authorization: Basic " . \base64_encode($this->credentials)
            );
            curl_setopt($request, CURLOPT_URL, $this->base_url . "/lists/");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
            
            $server_output = curl_exec($request);
            $status_code = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($status_code >= 400) {
                curl_close($request);
                throw new \Exception($server_output);
            }

            return json_decode($server_output);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getMembersByList()
    {
        try {
            $request = curl_init();
            $headers = array(
                "Authorization: Basic " . \base64_encode($this->credentials)
            );

            curl_setopt($request, CURLOPT_URL, $this->base_url . "/lists/" . $this->audience_id . "/members");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
            
            $server_output = curl_exec($request);
            $status_code = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($status_code >= 400) {
                curl_close($request);
                throw new \Exception($server_output);
            }

            return json_decode($server_output);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function insertMember($data)
    {
        try {
            $message = 'success';
            $payload = [];
            $payload['email_address'] = $data['email'];
            $payload['status'] = 'subscribed';
            $request = curl_init();
            $headers = array(
                "Authorization: Basic " . \base64_encode($this->credentials)
            );

            curl_setopt($request, CURLOPT_URL, $this->base_url . "/lists/" . $this->audience_id . "/members");
            curl_setopt($request, CURLOPT_POST, 1);
            curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec($request);

            $status_code = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($status_code >= 400) {
                curl_close($request);
                if (json_decode($server_output)->title == 'Member Exists') {
                    $message = 'Member Exists';
                    //return back()->with(['error_newsletter' => 'Your email has been registered before']);
                    //throw new \Exception(json_encode($this->status->error['EMAIL_REGISTERED']));
                }
                //dd($server_output);
                $message = 'Member Exists';
            }

            return $message;
        } catch (\Exception $e) {
            throw $e;
        }
    }

}
