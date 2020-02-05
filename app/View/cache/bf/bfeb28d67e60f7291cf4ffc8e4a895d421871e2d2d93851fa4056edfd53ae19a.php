<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* common/index.twig */
class __TwigTemplate_3a58c06aa4933228dce7d0c24d5e5f61b20e164c6336a21cc0d119433742426d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
  <meta charset=\"utf-8\">
  <title>Books</title>
  <meta name=\"description\" content=\"\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  <link rel=\"dns-prefetch\" href=\"//maps.googleapis.com\">
  <link rel=\"dns-prefetch\" href=\"//fonts.googleapis.com\">
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Raleway:400,500,700,800&display=swap\">
  <link rel=\"stylesheet\" href=\"css/main-76b66b5da2.css\">
</head>
<body>
    ";
        // line 14
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "</body>
</html>
";
    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "common/index.twig";
    }

    public function getDebugInfo()
    {
        return array (  65 => 15,  61 => 14,  55 => 17,  53 => 14,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "common/index.twig", "C:\\Users\\grand\\git\\cron-test\\app\\View\\templates\\common\\index.twig");
    }
}
