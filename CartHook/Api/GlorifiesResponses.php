<?php

namespace CartHook\Api;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Collection;

trait GlorifiesResponses
{
    /** @var  \Illuminate\Http\JsonResponse */
    private $response;
    private $metadata = [];

    public function respond() {
        $this->response = app(ResponseFactory::class)->json();
        return $this;
    }

    public function addMeta(array $metadata) {
        $this->metadata = array_merge($this->metadata, $metadata);
        return $this;
    }

    public function ok(string $message = '') {
        $this->response->setStatusCode(200);
        return $this->buildData($this->buildMessage($message));
    }

    public function withItem(Arrayable $item, int $statusCode = 200) {
        $this->response->setStatusCode($statusCode);
        return $this->buildData(['item' => $item->toArray()]);
    }

    public function withCollection(Collection $collection, int $statusCode = 200) {
        $this->addMeta(['count' => $collection->count()]);
        $this->response->setStatusCode($statusCode);
        return $this->buildData(['collection' => $collection]);
    }

    public function paginated(Paginator $paginator, int $statusCode = 200) {
        $this->addMeta($paginator->toArray());
        return $this->withCollection($paginator->getCollection());
    }

    private function buildData(array $data) {
        $responseData = $data;

        if(count($this->metadata)) {
            $responseData['meta'] = $this->metadata;
        }

        return $this->response->setData($responseData);
    }

    private function buildMessage($message) {
        if($message == null) {
            return [];
        }

        return ['message' => $message];
    }
}
