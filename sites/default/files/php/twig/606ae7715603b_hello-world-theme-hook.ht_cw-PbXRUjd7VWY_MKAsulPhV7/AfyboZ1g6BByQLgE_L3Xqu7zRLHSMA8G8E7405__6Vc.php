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

/* modules/custom/hello_world/templates/hello-world-theme-hook.html.twig */
class __TwigTemplate_3bc885663d9a640ca99d3583b66d8ff42e9239c2c484740ccff3a308bc281d40 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<h1>My lovely twig template.</h1>
<p>You passed this text: <b>";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["variable1"] ?? null), 2, $this->source), "html", null, true);
        echo "</b></p>
<p>You passed this number value: ";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["variable2"] ?? null), 3, $this->source), "html", null, true);
        echo "</p>
<p>And you passed this array:</p>

<ul>
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["variable3"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
            echo "    <li>
       ";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["item"], 9, $this->source), "html", null, true);
            echo "
    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</ul>

<p>Ciao!</p>

<a class=\"btn\" href=\"#\" onclick=\"myModule_ajax_load()\">Ajax Test</a>


<div id=\"ajax-target\">Ajax goes here!!!</div>
<script>
function myModule_ajax_load() {
  jQuery(\"#ajax-target\").load(\"/node/get/ajax/11\");
}
</script>";
    }

    public function getTemplateName()
    {
        return "modules/custom/hello_world/templates/hello-world-theme-hook.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 12,  60 => 9,  57 => 8,  53 => 7,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/hello_world/templates/hello-world-theme-hook.html.twig", "/var/www/html/modules/custom/hello_world/templates/hello-world-theme-hook.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 7);
        static $filters = array("escape" => 2);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
