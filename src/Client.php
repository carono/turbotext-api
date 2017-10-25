<?php


namespace carono\turbotext;


class Client extends ClientAbstract
{
    public $apiKey;
    public $url = 'www.turbotext.ru';
    public $protocol = 'https';
    public $method = 'POST';
    public $type = self::TYPE_FORM;
    public $output_type = self::TYPE_JSON;

    public function prepareData(array $data)
    {
        $data = parent::prepareData($data);
        $data['api_key'] = $this->apiKey;
        return $data;
    }

    public function getContent($urlRequest, $data = [])
    {
        $content = parent::getContent($urlRequest, $data);
        $response = new Response();
        foreach ($content as $key => $value) {
            $response->$key = $value;
        }
        return $response;
    }
}