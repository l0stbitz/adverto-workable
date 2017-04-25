<?php

/**
 * 
 */

namespace Adverto\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 * @author Josh Murphy
 *
 */
class WorkableCommand extends ContainerAwareCommand {

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
                ->setName('adverto:workable')
                ->setDescription('')
                ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Dry Run')
                ->setHelp('TODO: Fill this in');
    }

    /**
     * {@inheritdoc}
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->input = $input;
        $this->output = $output;
        $this->dryRun = $this->input->getOption('dry-run');
        $this->acquireWorkableFeed();
    }

    /**
     * 
     * @return boolean
     */
    protected function acquireWorkableFeed() {
       // $this->getContainer()->get('admin.workable_service')->postCandidate('DB79198418');
        
       /* $key = 'adverto:jobs:*';
        $res = $this->getContainer()->get('admin.redis_service')->getAll($key);
            print_r($res);exit;*/
        //$job = $this->getContainer()->get('admin.workable_service')->getJobFromRedis('97C65C4C47');
        //print_r($job);
        //$this->getContainer()->get('admin.workable_service')->getAccounts();
        //$this->getContainer()->get('admin.workable_service')->getStages();     
        /*$jobs = $this->getContainer()->get('admin.workable_service')->getJobsFromRedis();
        //print_r($jobs);
        foreach ($jobs as $job) {
            $res = $this->getContainer()->get('admin.workable_service')->getJobFromRedis($job->shortcode);
            print_r($res);
        }*/
        $candidates = $this->getContainer()->get('admin.workable_service')->getCandidatesFromRedis();
        print_r($candidates);
    }

}
