<?php


namespace League\OAuth2\Server\ResponseTypes;

use Psr\Http\Message\ResponseInterface;

class Response extends AbstractResponseType
{
    public function __construct(array $params)
    {
        $this->responseParams = $params;
    }

    /**
     * @param ResponseTypeInterface $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function generateHttpResponse(ResponseInterface $response)
    {
        $response = $response
            ->withStatus(200)
            ->withHeader('pragma', 'no-cache')
            ->withHeader('cache-control', 'no-store')
            ->withHeader('content-type', 'application/json; charset=UTF-8');

         $response->getBody()->write(\json_encode($this->responseParams));

         return $response;
    }
}
