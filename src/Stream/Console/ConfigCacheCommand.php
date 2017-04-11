<?php

namespace Anomaly\Streams\Platform\Stream\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use SuperClosure\Serializer;

class ConfigCacheCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'config:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a cache file for faster configuration loading';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new config cache command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem $files
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->call('config:clear');

        $config = $this->getFreshConfiguration();

        $config = $this->processConfig($config);

        $this->files->put(
            $this->laravel->getCachedConfigPath(),
            '<?php return ' . var_export($config, true) . ';' . PHP_EOL
        );

        $this->info('Configuration cached successfully!');
    }

    public function processConfig($config)
    {
        if (is_array($config))
        {
            foreach ($config as $key => $val)
            {
                $config[$key] = $this->processConfig($val);
            }
        }

        if ($config instanceof \Closure)
        {
            return (new Serializer())->serialize($config);
        }

        if (is_callable($config) && !is_string($config))
        {
            return var_export($config, true);
        }

        return $config;
    }

    /**
     * Boot a fresh copy of the application configuration.
     *
     * @return array
     */
    protected function getFreshConfiguration()
    {
        $app = require $this->laravel->bootstrapPath() . '/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app['config']->all();
    }
}
