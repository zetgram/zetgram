<?php

namespace Zetgram;

use Predis\ClientInterface;

class FSM
{
    /**
     * @var ClientInterface
     */
    private ClientInterface $redisClient;
    /**
     * @var int
     */
    private ?int $chatId;
    private ?string $state;

    public function __construct(ClientInterface $redisClient, int $chatId = null)
    {
        $this->redisClient = $redisClient;
        $this->chatId = $chatId;
    }

    public function setChatId(int $chatId)
    {
        $this->chatId = $chatId;
        return $this;
    }

    public function setState(string $state)
    {
        return $this->setData('state', $state);
    }

    public function setData(string $key, string $value)
    {
        return $this->redisClient->hset($this->chatId, $key, $value);
    }

    public function getState()
    {
//        if(!isset($this->state))
//            $this->state = $this->getData('state');
//        return $this->state;
        return $this->getData('state');
    }

    public function getData(string $key)
    {
        return $this->redisClient->hget($this->chatId, $key);
    }

    public function getAll()
    {
        return $this->redisClient->hgetall($this->chatId);
    }

    public function keys()
    {
        return $this->redisClient->hkeys($this->chatId);
    }

    public function clear()
    {
        $keys = $this->keys();
        if (empty($keys))
            return false;
        return $this->redisClient->hdel($this->chatId, $keys);
    }

    public function del(...$keys)
    {
        return $this->redisClient->hdel($this->chatId, $keys);
    }

}
