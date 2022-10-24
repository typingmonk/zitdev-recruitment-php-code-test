<?php

namespace App\Service;
use think\LogManager;

interface LoggerStrategy
{
	public function info($msg);
	public function debug($msg);
    public function error($msg);	
}

class Log4phpStrategy implements LoggerStrategy
{
	private $logger;

	public function __construct(){
		$this->logger = \Logger::getLogger("Log");
	}

	public function info($msg = ''){
		$this->logger->getLogger("Log")->info($msg);
	}

	public function debug($msg){
		$this->logger->debug($msg);
	}

	public function error($msg){
		$this->logger->error($msg);
	}
}

class ThinklogStrategy implements LoggerStrategy
{
	private $logger;

	public function __construct(){
		$this->logger = new LogManager();
    }

	public function info($msg = ''){
		$this->logger->info(strtoupper($msg));
	}

	public function debug($msg){
		$this->logger->debug(strtoupper($msg));
	}

	public function error($msg){
		$this->logger->error(strtoupper($msg));
	}
}

class AppLogger
{
	const TYPE_LOG4PHP = 'log4php';
	const TYPE_THINK_LOG = 'think-log';

	private $strategy = NULL;
	public function __construct($loggerStrategy = self::TYPE_LOG4PHP) {
		switch ($loggerStrategy) {
			case self::TYPE_LOG4PHP:
				$this->strategy = new Log4phpStrategy();
				break;
			case self::TYPE_THINK_LOG:
				$this->strategy = new ThinklogStrategy();
				break;	
			default:
				$this->strategy = new Log4phpStrategy();
		}
	}
}
