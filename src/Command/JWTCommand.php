<?php

declare(strict_types=1);

namespace Jac1800\JWTAuth\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

// https://gitee.com/xmo/jwt-auth  原作者 liyuzhao 现维护者：xmo

#[Command]
class JWTCommand extends HyperfCommand
{
    /**
     * 执行的命令行.
     *
     * @var string
     */
    protected  $name = 'jwt:publish';

    public function handle(): void
    {
        // 从 $input 获取 config 参数
        $argument = $this->input->getOption('config');
        if ($argument) {
            $this->copySource(__DIR__ . '/../../publish/jwt.php', BASE_PATH . '/config/autoload/jwt.php');
            $this->line('The jwt-auth configuration file has been generated', 'info');
        }
    }

//    protected function getArguments()
//    {
//        return [
//            ['name', InputArgument::OPTIONAL, 'Publish the configuration for jwt-auth']
//        ];
//    }

    protected function getOptions()
    {
        return [
            ['config', null, InputOption::VALUE_NONE, 'Publish the configuration for jwt-auth'],
        ];
    }

    /**
     * 复制文件到指定的目录中.
     *
     * @param $copySource
     * @param $toSource
     */
    protected function copySource($copySource, $toSource): void
    {
        copy($copySource, $toSource);
    }
}
