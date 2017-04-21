<?php

namespace Adverto\AdminBundle\Service;

use Predis\Connection\ConnectionException;
use Predis\ServerException;
use Symfony\Component\Debug\Exception\ContextErrorException;
use Adverto\AdminBundle\Service\RedisService as CS;

/**
 * Description of RedisService
 *
 * @author Josh Murphy
 */
class RedisService {

    protected $_c;
    protected $logger;
    protected $expire;
    protected $verbose = true;

    const PREFIX = 'adverto';
    const SP = ':';
    const JOBS = 'jobs';
    const APPFIELDS = 'appflds';
    const CANDIDATES = 'cnddts';
    const TIMESTAMP = 'timestamp';
    
    /**
     *
     * @param unknown $cache
     */
    public function __construct($container) {
        $this->_c = $container->get('snc_redis.default');
        $this->expire = 3600;
        $this->logger = $container->get('logger');
    }
    
    /**
     *
     */
    public function getAll($name) {
        try {
            $data = [];
            $keys = $this->_c->keys($name);
            foreach($keys as $key){
                $data[] = json_decode($this->get($key));
            }
            return $data;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
        }
        return false;
    }

    /**
     *
     */
    public function get($name) {
        try {
            return $this->_c->get($name);
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
        }
        return false;
    }

    /**
     *
     */
    public function set($name, $data) {
        try {
            $this->_c->set($name, $data);
            return true;
        } catch (ContextErrorException $e) {
            $this->logger->error($e->getMessage());
            return false;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
            return false;
        }
    }

    /**
     *
     * @param string $name
     * @param int    $score
     * @param string $data
     * @return boolean
     */
    public function getScore($key) {
        try {
            $this->logger->debug($key);
            return $data = $this->_c->zScore(CS::PREFIX . CS::SP . CS::TIMESTAMP, $key);
        } catch (ContextErrorException $e) {
            $this->logger->error($e->getMessage());
            return false;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
            return false;
        }
    }

    /**
     *
     * @param string $name
     * @param int    $score
     * @param string $data
     * @return boolean
     */
    public function sortedSetAdd($name, $score, $data) {
        try {
            $this->_c->zAdd($name, $score, $data);
        } catch (ContextErrorException $e) {
            $this->logger->error($e->getMessage());
            return false;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
            return false;
        }
        return true;
    }

    /**
     *
     * @param string $name
     * @param string $data
     * @return bool
     */
    public function sortedSetRemove($name, $data) {
        try {
            $this->_c->zRem($name, $data);
        } catch (ContextErrorException $e) {
            $this->logger->error($e->getMessage());
            return false;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
            return false;
        }
        return true;
    }

    /**
     *
     * @param string $name
     * @param int    $start
     * @param int    $end
     * @param bool   $withScores
     * @return array
     */
    public function sortedSetRange($name, $start = 0, $end = -1, $withScores = false) {
        try {
            if ($withScores == true) {
                $result = $this->_c->zRange($name, $start, $end, ['withscores' => $withScores]);
            } else {
                $result = $this->_c->zRange($name, $start, $end);
            }
        } catch (ContextErrorException $e) {
            $this->logger->error($e->getMessage());
            return false;
        } catch (ConnectionException $e) {
            $this->logger->error($e->getMessage());
            return false;
        }

        return $result;
    }
}
