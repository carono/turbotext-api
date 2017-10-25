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

    /**
     * @param array $data
     * @return array|string
     */
    public function prepareData(array $data)
    {
        $data = parent::prepareData($data);
        $data['api_key'] = $this->apiKey;
        return $data;
    }

    /**
     * @param $urlRequest
     * @param array $data
     * @param string $responseClass
     * @return mixed
     */
    public function getContent($urlRequest, $data = [], $responseClass = '\carono\turbotext\Response')
    {
        try {
            $content = parent::getContent($urlRequest, $data);
            return self::stdClassToResponse($content, $responseClass);
        } catch (\Exception $e) {
            $response = new Response();
            $response->success = false;
            $response->errors = $e->getMessage();
            return $response;
        }
    }

    /**
     * @param $stdClass
     * @param $responseClass
     * @return ResponseAbstract
     */
    protected static function stdClassToResponse($stdClass, $responseClass)
    {
        /**
         * @var ResponseAbstract $response
         */
        $response = new $responseClass();
        foreach ($stdClass as $key => $value) {
            if (method_exists($response, 'getResponseClass') && ($class = $response->getResponseClass($key)) && is_array($value)) {
                foreach ($value as $item) {
                    $response->{$key}[] = self::stdClassToResponse($item, $class);
                }
            } else {
                $response->$key = $value;
            }
        }
        return $response;
    }
}