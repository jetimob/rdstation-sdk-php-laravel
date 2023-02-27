<?php

namespace Jetimob\RDStation\Console;

use Illuminate\Console\Command;
use Jetimob\Http\Authorization\OAuth\AccessToken;
use Jetimob\Http\Authorization\OAuth\Storage\FileCacheRepository;
use Jetimob\RDStation\Facades\RDStation;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class HandleAuthorizationCodeExchange extends Command
{
    protected $signature = 'rdstation:code';
    protected $description = 'Executa o fluxo de troca de código de autorização por um token de acesso dentro do fluxo de OAuth 2.0';

    public function configure(): void
    {
        $this->setDefinition([
            new InputArgument('code', InputArgument::REQUIRED, 'Código de autorização'),
            new InputOption('test', ['t'], InputOption::VALUE_NONE, 'Executa o comando utilizando o repo de cache em arquivo'),
        ]);
    }

    public function handle()
    {
        $code = $this->argument('code');

        if (empty($code)) {
            $this->error('Código de autorização não informado');
            return;
        }

        if ($this->option('test')) {
            RDStation::getHttpInstance()->overwriteConfig(
                'oauth_access_token_repository',
                FileCacheRepository::class,
            );
        }

        /** @var AccessToken $at */
        $at = RDStation::getHttpInstance()->oAuth()->handleAuthorizationCodeExchange($code);
    }
}
