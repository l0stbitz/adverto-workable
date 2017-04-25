<?php

namespace Adverto\AdminBundle\Service;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Adverto\AdminBundle\Service\RedisService as CS;

class WorkableService {

    protected $redis;
    protected $container;

    /**
     * Constructor
     *
     * @param mixed $container
     */
    public function __construct($container) {
        $this->container = $container;
        $this->em = $container->get('doctrine')->getManager();
        $this->redis = $container->get('admin.redis_service');
        $this->subDomain = 'adverto';
        $this->apiKey = '14941274e70939c31b362b19f8fabedc804294bfb7559b100efdfa6aa984d0d1';
    }

    /**
     * Gets the response from the Workable API
     * @return
     */
    public function getResponse($endpoint, $params = [], $method = 'GET') {
        $client = new Client();
        $url = "https://" . $this->subDomain . ".workable.com/spi/v3/" . $endpoint;
        $data = [
            'stream' => true,
            'headers' => ['Authorization' => 'Bearer ' . $this->apiKey]
        ];
        //Get response
        switch ($method) {
            case 'POST':
                $data['json'] = $params;
                $response = $client->post($url, $data);
                break;
            case 'GET':
            default:
                $response = $client->get($url . "?" . http_build_query($params), $data);
                break;
        }

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Gets all the jobs from the Workable API
     * @return
     */
    public function getJobs($sinceId = false) {
        $jobs = [];
        $data = []; //['include_fields' => 'industry'];
        if ($sinceId)
            $data['since_id'] = $sinceId;
        $response = $this->getResponse('jobs', $data);
        if (isset($response->jobs)) {
            $jobs = $response->jobs;
        }
        if (isset($response->paging) && isset($response->paging->next)) {
            $parts = parse_url($response->paging->next);
            parse_str($parts['query'], $query);
            if (isset($query['since_id'])) {
                $jobs = array_merge($jobs, $this->getJobs($query['since_id']));
            }
        }

        return $jobs;
    }

    public function getJobsFromRedis($cached = false) {
        $key = CS::PREFIX . CS::SP . CS::JOBS;
        $jobs = json_decode($this->redis->get($key));
        if ($cached)
            return $jobs;
        $timestamp = $this->redis->getScore($key);
        if (!$jobs || time() - $timestamp > 15 * 60) {
            $jobs = $this->getJobs();
            $this->redis->sortedSetAdd(CS::PREFIX . CS::SP . CS::TIMESTAMP, time(), $key);
            $this->redis->set($key, json_encode($jobs));
        }

        return $jobs;
    }

    /**
     * Gets all the job from the Workable API
     * @return
     */
    public function getJob($shortcode) {
        $response = $this->getResponse('jobs/' . $shortcode);
        return $response;
    }

    public function getJobFromRedis($jobId, $cached = false) {
        $key = CS::PREFIX . CS::SP . CS::JOBS . CS::SP . $jobId;
        $job = json_decode($this->redis->get($key));
        if ($job && $cached)
            return $job;
        $timestamp = $this->redis->getScore($key);
        if (!$job || time() - $timestamp > 15 * 60) {
            $job = $this->getJob($jobId);
            $this->redis->sortedSetAdd(CS::PREFIX . CS::SP . CS::TIMESTAMP, time(), $key);
            $this->redis->set($key, json_encode($job));
        }

        return $job;
    }

    /**
     * Gets the job application fields 
     * @return
     */
    public function getJobAplicationFields($shortcode) {
        $response = $this->getResponse('jobs/' . $shortcode . '/application_form');
        return $response;
    }

    public function getJobApplicationFieldsFromRedis($jobId, $cached = false) {
        $key = CS::PREFIX . CS::SP . CS::JOBS . CS::APPFIELDS . CS::SP . $jobId . CS::SP;
        $job = json_decode($this->redis->get($key));
        if ($job && $cached)
            return $job;
        $timestamp = $this->redis->getScore($key);
        if (!$job || time() - $timestamp > 15 * 60) {
            $job = $this->getJobAplicationFields($jobId);
            $this->redis->sortedSetAdd(CS::PREFIX . CS::SP . CS::TIMESTAMP, time(), $key);
            $this->redis->set($key, json_encode($job));
        }

        return $job;
    }

    /**
     * Gets all the candidates from the Workable API
     * @return
     */
    public function getCandidates($sinceId = false) {
        $candidates = [];
        $response = $this->getResponse('candidates', $sinceId ? ['since_id' => $sinceId] : []);
        if (isset($response->candidates)) {
            $candidates = $response->candidates;
        }
        if (isset($response->paging) && isset($response->paging->next)) {
            $parts = parse_url($response->paging->next);
            parse_str($parts['query'], $query);
            if (isset($query['since_id'])) {
                $candidates = array_merge($candidates, $this->getCandidates($query['since_id']));
            }
        }

        return $candidates;
    }

    public function getCandidatesFromRedis($cached = false) {
        $key = CS::PREFIX . CS::SP . CS::CANDIDATES;
        $candidates = json_decode($this->redis->get($key));
        if ($cached)
            return $candidates;
        $timestamp = $this->redis->getScore($key);
        if (!$candidates || time() - $timestamp > 15 * 60) {
            $candidates = $this->getCandidates();
            $this->redis->sortedSetAdd(CS::PREFIX . CS::SP . CS::TIMESTAMP, time(), $key);
            $this->redis->set($key, json_encode($candidates));
        }

        return $candidates;
    }

    /**
     * Gets all the candidates from the Workable API
     * @return
     */
    public function postCandidate($jobId, $data = []) {
        //required fields
        if(!isset($data['name'])){
            // Throw error or default?
        }
        if(!isset($data['firstname'])){
            // Throw error or default?
        }
        if(!isset($data['lastname'])){
            // Throw error or default?
        }
        if(!isset($data['email'])){
            // Throw error or default?
        }
        $params = [
            "sourced"=>true,
            "candidate"=>$data
        ];

        /*$params = json_decode('{
  "sourced": true,
  "candidate": {
    "name": "J Murphy TESTING",
    "firstname": "J",
    "lastname": "MURPHY",
    "headline": "TESTING",
    "summary": "A focussed, results-driven team player with many year experience in the field. Working my way up to management level, I have experience of every aspect of this role. I understand the challenges it brings, and have a proven track record of providing solutions.",
    "address": "25772 Gustave Shore, Iowa, USA",
    "phone": "1-859-557-6573",
    "email": "test2@lostbitz.com"}}');*/
        //$params->shortcode = $jobId;
        print_r($params);
        //Get response
        $response = $this->getResponse('jobs/' . $jobId . '/candidates/', $params, 'POST');

        print_r($response);
        return $response;
    }

    /**
     * Gets all the stages from the Workable API
     * @return
     */
    public function getStages() {
        //Get response
        $response = $this->getResponse('stages');

        print_r($response);
    }

    /**
     * Gets all the accounts from the Workable API
     * @return
     */
    public function getAccounts($sinceId = false) {
        $accounts = [];
        //Get response
        $response = $this->getResponse('accounts', $sinceId ?? []);
        if (isset($response['accounts'])) {
            $accounts = $response['accounts'];
        }
        if (isset($response['paging']) && isset($response['paging']['next'])) {
            $data = explode($response['paging']['next']);
            if (isset($data['since_id']))
                $accounts = array_merge($accounts, $this->getAccounts($data['since_id']));
        }
        return $accounts;
    }

}
