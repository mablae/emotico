<?php

/* NelmioApiDocBundle::resources.html.twig */
class __TwigTemplate_040ab3e6d2d18560fbb74dbf86fcf55a5aa563261a9308ff067381c53da6f85e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("NelmioApiDocBundle::layout.html.twig", "NelmioApiDocBundle::resources.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NelmioApiDocBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["resources"]) ? $context["resources"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["section"] => $context["sections"]) {
            // line 5
            echo "        ";
            if (($context["section"] != "_others")) {
                // line 6
                echo "            <li class=\"section";
                echo (((isset($context["defaultSectionsOpened"]) ? $context["defaultSectionsOpened"] : null)) ? (" active") : (""));
                echo "\">
                <div class=\"actions\">
                    <a class=\"action-show-hide\">Show/hide</a>
                    <a class=\"action-list\">List Operations</a>
                    <a class=\"action-expand\">Expand Operations</a>
                </div>
                <h1>";
                // line 12
                echo twig_escape_filter($this->env, $context["section"], "html", null, true);
                echo "</h1>
                <ul class=\"section-list\" ";
                // line 13
                if ( !(isset($context["defaultSectionsOpened"]) ? $context["defaultSectionsOpened"] : null)) {
                    echo "style=\"display: none\"";
                }
                echo ">
        ";
            }
            // line 15
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sections"]);
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["resource"] => $context["methods"]) {
                // line 16
                echo "            <li class=\"resource\">
                <div class=\"heading\">
                    ";
                // line 18
                if ((($context["section"] == "_others") && ($context["resource"] != "others"))) {
                    // line 19
                    echo "                        <h2>";
                    echo twig_escape_filter($this->env, $context["resource"], "html", null, true);
                    echo "</h2>
                    ";
                } elseif ((                // line 20
$context["resource"] != "others")) {
                    // line 21
                    echo "                        <h2>";
                    echo twig_escape_filter($this->env, $context["resource"], "html", null, true);
                    echo "</h2>
                    ";
                }
                // line 23
                echo "                </div>
                <ul class=\"endpoints\">
                    <li class=\"endpoint\">
                        <ul class=\"operations\">
                            ";
                // line 27
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["methods"]);
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 28
                    echo "                                ";
                    $this->loadTemplate("NelmioApiDocBundle::method.html.twig", "NelmioApiDocBundle::resources.html.twig", 28)->display($context);
                    // line 29
                    echo "                            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "                        </ul>
                    </li>
                </ul>
            </li>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['resource'], $context['methods'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "        ";
            if (($context["section"] != "_others")) {
                // line 36
                echo "                </ul>
            </li>
        ";
            }
            // line 39
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['section'], $context['sections'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::resources.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 39,  171 => 36,  168 => 35,  150 => 30,  136 => 29,  133 => 28,  116 => 27,  110 => 23,  104 => 21,  102 => 20,  97 => 19,  95 => 18,  91 => 16,  73 => 15,  66 => 13,  62 => 12,  52 => 6,  49 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "NelmioApiDocBundle::layout.html.twig" %}*/
/* */
/* {% block content %}*/
/*     {% for section, sections in resources  %}*/
/*         {% if section != '_others' %}*/
/*             <li class="section{{ defaultSectionsOpened? ' active':'' }}">*/
/*                 <div class="actions">*/
/*                     <a class="action-show-hide">Show/hide</a>*/
/*                     <a class="action-list">List Operations</a>*/
/*                     <a class="action-expand">Expand Operations</a>*/
/*                 </div>*/
/*                 <h1>{{ section }}</h1>*/
/*                 <ul class="section-list" {% if not defaultSectionsOpened %}style="display: none"{% endif %}>*/
/*         {% endif %}*/
/*         {% for resource, methods in sections %}*/
/*             <li class="resource">*/
/*                 <div class="heading">*/
/*                     {% if section == '_others' and resource != 'others' %}*/
/*                         <h2>{{ resource }}</h2>*/
/*                     {% elseif resource != 'others' %}*/
/*                         <h2>{{ resource }}</h2>*/
/*                     {% endif %}*/
/*                 </div>*/
/*                 <ul class="endpoints">*/
/*                     <li class="endpoint">*/
/*                         <ul class="operations">*/
/*                             {% for data in methods %}*/
/*                                 {% include 'NelmioApiDocBundle::method.html.twig' %}*/
/*                             {% endfor %}*/
/*                         </ul>*/
/*                     </li>*/
/*                 </ul>*/
/*             </li>*/
/*         {% endfor %}*/
/*         {% if section != '_others' %}*/
/*                 </ul>*/
/*             </li>*/
/*         {% endif %}*/
/*     {% endfor %}*/
/* {% endblock content %}*/
/* */
