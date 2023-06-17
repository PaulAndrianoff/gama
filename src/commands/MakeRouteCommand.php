<?php

namespace Gama\GamaPhp\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeRouteCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('make:route')
            ->setDescription('Create a new route and corresponding controller')
            ->addArgument('path', InputArgument::REQUIRED, 'The path of the new route');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');
        $controllerName = $this->generateControllerName($path);
        $viewName = $this->generateViewName($path);
        $controllerContent = $this->generateControllerContent($controllerName);

        $routeContent = $this->generateRouteContent($path, $controllerName);

        // Save the controller file
        file_put_contents(__DIR__ . '/../Controllers/' . $controllerName . '.php', $controllerContent);
        $output->writeln('Controller created successfully: ' . $controllerName);

        // Create the view directory
        mkdir(__DIR__ . '/../Views/' . $viewName);

        // Save the view file
        $viewContent = $this->generateViewContent($controllerName);
        file_put_contents(__DIR__ . '/../Views/' . $controllerName . '/index.php', $viewContent);
        $output->writeln('View created successfully: ' . $controllerName . '/index');

        // Append the route to the route file
        file_put_contents(__DIR__ . '/../Routes/web.php', $routeContent, FILE_APPEND);
        $output->writeln('Route added successfully: ' . $path);
    }

    private function generateControllerName($path)
    {
        $segments = explode('/', $path);
        $lastSegment = end($segments);
        $controllerName = ucfirst($lastSegment) . 'Controller';
        return $controllerName;
    }

    private function generateViewName($path)
    {
        $segments = explode('/', $path);
        $lastSegment = end($segments);
        $viewName = ucfirst($lastSegment);
        return $viewName;
    }

    private function generateControllerContent($controllerName)
    {
        $namespace = 'Gama\GamaPhp\Controllers';

        $content = "<?php\n\n";
        $content .= "namespace $namespace;\n\n";
        $content .= "class $controllerName\n";
        $content .= "{\n";
        $content .= "    public function index()\n";
        $content .= "    {\n";
        $content .= "        // Render the index template\n";
        $content .= "        require_once __DIR__ . '/../../Views/$controllerName/index.php';\n";
        $content .= "    }\n";
        $content .= "}\n";

        return $content;
    }

    private function generateViewContent($controllerName)
    {
        $content = "<h1>Welcome to $controllerName</h1>\n";

        return $content;
    }

    private function generateRouteContent($path, $controllerName)
    {
        $content = "\n";
        $content .= "Route::get('$path', '$controllerName@index');\n";

        return $content;
    }
}
