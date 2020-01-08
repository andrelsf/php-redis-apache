<?php

require __DIR__ . "/../vendor/autoload.php";

$redis = new Redis();

// Connect to Redis
//$redis->connect('172.70.0.3', 6379);

/**
 * Default port 6379
 */
//$redis->connect('172.70.0.3', 6379);

/**
 * Timeout of 3.5 seconds
 */
//$redis->connect('172.70.0.3', 6379, 3.5);

/**
 * Sockect SO Unix
 */
//$redis->connect('/var/temp/redis/redis.sock');

/**
 * Uma espera de 150ms entre as tentativas de conexão
 * respeitando o timeout de 2,5 segundos.
 */
try{
    $redis->connect('172.70.0.3', 6379, 3.5, null, 150);
    
    $redis->set('chave', 'valor');

    /**
     * GET and MGET: para pegar um valor de uma chave ou de várias chaves.
     */
    print $redis->get('chave');

    $chaves = ['chave1', 'chave2', 'chave3'];
    $results = $redis->mset($chaves);

    print $redis->get('chave1');
    print $redis->get('chave2');
    print $redis->get('chave3');

   /**
    * SET and SETEX: para definir um valor em uma chave e definir um valor com um tempo de expiração
    */
    $redis->set('nome', 'Andre Ferreira');

    $redis->setex('valorTemporario', 3600, '7987f9a8s7dfa89sdf70987');

    print $redis->get('valorTemporario');
    $nome = $redis->get('nome');
    echo $nome . "<br />" . PHP_EOL;

    /**
     *  Exists and keys: para verificar se existi uma chave e buscando chaves com expressões regulares
     */

     // FIM
} catch (\RedisException $e) {
    print $e->getMessage();
}