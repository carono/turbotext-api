<?php


namespace carono\turbotext;


class Client extends ClientAbstract
{
    public $apiKey;
    public $url = 'www.turbotext.ru';
    public $protocol = 'http';
    public $method = 'POST';
    public $type = self::TYPE_FORM;
    public $output_type = self::TYPE_JSON;

    public function prepareData(array $data)
    {
        $data = parent::prepareData($data);
        $data['api_key'] = $this->apiKey;
        return $data;
    }
}